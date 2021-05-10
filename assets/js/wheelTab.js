var startAngle = -1.0472
var endAngle = 5.23599
var height = 700
var width = window.innerWidth;

    function organization_polarities_example () {
        let element_id = 'sample';
        let outerData = [
            {name: "sdadsaa",   color: "#3B6B9E"},
            {name: "Achievement", color: "#3B6B9E"},
            {name: "Reliability", color: "#3B6B9E"},
            {name: "Reliability", color: "#3B6B9E"},
            {name: "Reliability", color: "#3B6B9E"},
            {name: "Reliability", color: "#3B6B9E"},
        ];
    
        return drawPolaritiesWheel(element_id, outerData);
    }

    function drawDonut(svg, pie, arc, drawLabels, groupId) {
        svg.append("g")
            .attr("id", groupId)
            .selectAll("path")
            .data(pie)
            .join("path")
            .attr("fill", d => d.data.color)
            .attr('class', 'sample')
            .attr("d", arc)
            .style("cursor", "pointer")
            .on("click", clicked)
            .each(function (d, i) { // Must use function notation because it uses 'this' to refer to bound selection
			// Search pattern for everything between the start and the first capital L
			const firstArcSection = /(^.+?)L/; 	
			// Grab everything up to the first Line statement
			let newArc = firstArcSection.exec( d3.select(this).attr("d") )[1];

			// Replace all the comma's so that IE can handle it
			newArc = newArc.replace(/,/g , " ");
			
			// If the end angle lies beyond a quarter of a circle (90 degrees or pi/2) 
			// flip the end and start position
			if (d.endAngle > 90 * Math.PI / 180) {
				const startLoc 	= /M(.*?)A/;		  // Everything between the first capital M and first capital A
				const	middleLoc = /A(.*?)0 0 1/;  // Everything between the first capital A and 0 0 1
				const endLoc 		= /0 0 1 (.*?)$/;	// Everything between the first 0 0 1 and the end of the string

				// Flip the direction of the arc by switching the start and end point (and sweep flag)
				// of those elements that are below the horizontal line
				const newStart = endLoc.exec(newArc)[1];
				const newEnd = startLoc.exec(newArc)[1];
				const middleSec = middleLoc.exec(newArc)[1];
				
				// Build up the new arc notation, set the sweep-flag to 0
				newArc = "M" + newStart + "A" + middleSec + "0 0 0 " + newEnd;      
			}
			
			// Create a new invisible arc that the text can flow along
			svg.selectAll(`#${groupId}`).append("path")
				.attr("class", "hiddenTextArcs")
				.attr("id", groupId + i)
				.attr("d", newArc)
				.style("fill", "none");
		})
        .append("title")
        .text(d => d.data.name);

        svg.append("circle").attr("r", 245).attr("fill", "#FFF").attr("style", "filter:url(#dropshadow)");
        svg.append("text").attr("class", "toolCircle").attr("dy", 245).attr("font-size", 1 + "em").text('sample')
   
  if (drawLabels) drawArcLabels(svg, pie, arc, groupId);
}

function clicked(event, p) {
    console.log(event, p);

}

function drawArcLabels(svg, arcs, arc, groupId) {
  svg.selectAll(".donutText")
    .data(arcs)
    .enter()
    .append("text")
    .attr("class", `${groupId}Text`)
	// Move the labels below the arcs for those slices with an end angle greater than 90 degrees
	.attr("dy", (d,i) => (d.endAngle > 90 * Math.PI / 180 ? -50 : 60) )
    // .attr("dy", (345/2))
	.append("textPath")
  	.style("text-anchor", "middle")
    .attr("font-size", 18)
	.attr("startOffset", "50%")
    .attr("fill", "black")
	.attr("href", (d, i) => `#${groupId + i}`)
	.text(d => d.data.name);
}

function drawPolaritiesWheel(element_id, outerData) {

  const pie = d3.pie()
    .startAngle(startAngle)
    .endAngle(endAngle)
    .padAngle(0.01)
    .sort(null)
    .value(1);
  
    const arc = (innerFactor, outerFactor) => {
    const radius = Math.min(width, height) / 2;
    
    return d3.arc().innerRadius(245).outerRadius(245 + 100);
  }
 
  const svg = d3.select('#'+ element_id).append("svg")
      .attr("viewBox", [-width / 2, -height / 2, width, height]);

    var defs = svg.append("defs")
			
    var filter = defs.append("filter")
        .attr("id","drop-shadow");
                
    filter.append("feGaussianBlur")
        .attr("in","SourceAlpha")
        .attr("stdDeviation",3)
        .attr("result","blur");
    filter.append("feOffset")
        .attr("in","blur")
        .attr("dx",3)
        .attr("dy",3)
        .attr("result","offsetBlur");
                    
    var feMerge = filter.append("feMerge");
                
    feMerge.append("feMergeNode")
        .attr("in","offsetBlur");
    feMerge.append("feMergeNode")
        .attr("in","SourceGraphic");


  // Running tally of the amount of arc remaining in the wheel (from 1 down to 0)
  let outerArc = 1;
  
  // Draw the 3 donuts in the Polarities key portion of the wheel
  [
    { className: 'outer',  data: outerData },
  ].forEach(ele => {
    drawDonut(svg, pie(ele.data), arc(outerArc - 0.1, outerArc - 0.005), true, ele.className);
    outerArc = outerArc - 0.1;
  });


  
  
  // Draw the grid divider
  outerArc = outerArc - .01;
  
  return svg.node();
}
    

organization_polarities_example();
