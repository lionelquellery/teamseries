function draw(t,e){var a=40,r=d3.scale.linear().domain([0,d3.max(e)]).range([0+a,h-60]),n=d3.scale.linear().domain([0,e.length]).range([0+a,w+50]),i=d3.svg.line().x(function(t,e){return n(e)}).y(function(t,e){return-1*r(t)}),s=d3.select(t).select("svg").select("g");s.empty()&&(s=d3.select(t).append("svg:svg").attr("width",w).attr("height",h),g=s.append("svg:g").attr("transform","translate(0, 350)"),g.append("svg:line").attr("x1",n(0)).attr("y1",-1*r(0)).attr("x2",n(w)).attr("y2",-1*r(0)),g.append("svg:line").attr("y1",-1*r(0)).attr("y2",r(h)).attr("y2",-1*r(0)),g.selectAll(".xLabel").data(n.ticks(12)).enter().append("svg:text").attr("class","xLabel").text(String).attr("x",function(t){return n(t-1)}).attr("y",0).attr("text-anchor","middle")),g.append("svg:path").attr("class",t).attr("d",i(reset)).transition().duration(duration).ease(ease).attr("d",i(e)),g.selectAll("dot").data(e).enter().append("circle").attr("class",t).attr("r",6.5).attr("cx",function(t,e){return n(e)}).attr("cy",0).transition().duration(duration).ease(ease).attr("cy",function(t){return-1*r(t)}).attr("title",function(t,e){return n(e)}),current=t,console.log("current = "+current,"data = "+e),$("svg circle").tipsy({gravity:"s",html:!0,fade:!0,opacity:.95,title:function(){var t=this.__data__,a=t.date;return a=e.length,"Saison: "+e}})}function removeData(t){d3.selectAll("circle."+t).transition().duration(duration).ease(ease).attr("cy",0).attr("r",0).remove(),d3.selectAll("path."+t).remove()}function generateData(t){var e=[];d3.json("../js/data.json",function(e,a,r){return e?console.warn(e):(r=a,r=r[0],obj=r,console.log(r),console.log(r),void draw(t,r))})}function pageInit(){generateData("#entity-chart")}var w=780,h=350,vis=null,g,current,duration=700,ease="elastic",obj,reset=[],id;$(document).ready(function(){pageInit()});