function draw(t){var e=generateData(),a=generateOtherData(),r=30,n=d3.scale.linear().domain([0,d3.max(e)]).range([0+r,h-60]),i=d3.scale.linear().domain([0,e.length]).range([0+r,w+50]),c=d3.svg.line().x(function(t,e){return i(e)}).y(function(t){return-1*n(t)});console.log(e);var s=d3.select("#entity-chart").select("svg").select("g");s.empty()&&(s=d3.select("#entity-chart").append("svg:svg").attr("width",w).attr("height",h),g=s.append("svg:g").attr("transform","translate(0, 350)"),g.append("svg:line").attr("x1",i(0)).attr("y1",-1*n(0)).attr("x2",i(w)).attr("y2",-1*n(0)),g.selectAll(".xLabel").data(i.ticks(12)).enter().append("svg:text").attr("class","xLabel").text(String).attr("x",function(t){return i(t-1)}).attr("y",0).attr("text-anchor","middle")),g.append("svg:path").attr("class",t).attr("d",c(reset)).transition().duration(duration).ease(ease).attr("d",c(e)),g.selectAll("dot").data(e).enter().append("circle").attr("class",t).attr("r",6.5).attr("cx",function(t,e){return i(e)}).attr("cy",0).transition().duration(duration).ease(ease).attr("cy",function(t){return-1*n(t)}).attr("title",function(t,e){return i(e)}),current=t,console.log("current = "+current,"data = "+e),$("svg circle").tipsy({gravity:"s",html:!0,fade:!0,opacity:.95,title:function(){var t=this.__data__,e=t.date;return"Metric: "+Math.floor(t)}})}function removeData(t){d3.selectAll("circle."+t).transition().duration(duration).ease(ease).attr("cy",0).attr("r",0).remove(),d3.selectAll("path."+t).remove()}function generateData(){for(var t=[],e=0,a=12;a>e;e++)t.push(Math.round(Math.random()*a));return t}function generateOtherData(){var t=[3,9,3,1,5,4,4,5,6,9,4,2];return t}function subMetricChange(){$(".benchmarks-checkbox").on("change",function(t){id=$(this).attr("id"),$(this).is(":checked")?($(this).parent().addClass("active"),draw(id)):(removeData(id),$(this).parent().removeClass("active")),t.preventDefault()}),$('button[type="submit"]').on("click",function(t){$(".benchmarks-checkbox").prop("checked",!1),$(".benchmarks-label").removeClass("active"),id=$(this).attr("id"),$(".sub-metric-checkbox").parent().removeClass("active"),d3.selectAll("circle").transition().duration(duration).ease(ease).attr("cy",0).attr("r",0).remove(),d3.selectAll("path").remove(),$(this).parent().addClass("active"),draw(id),t.preventDefault()})}function pageInit(){$("#Scoring-Metric-1").addClass("first").attr("checked","checked").parent().addClass("active"),id=$(".sub-metric-checkbox.first").attr("id"),draw(id)}var w=780,h=350,vis=null,g,current,duration=700,ease="cubic-out",reset=[0,0,0,0,0,0,0,0,0,0,0,0,0];$(document).ready(function(){subMetricChange(),pageInit()});