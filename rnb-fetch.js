function rnb_fetch(query,endpoint){
  //alert(endpoint+query);

  fetch(endpoint+query)
  .then((response) => response.json())
  .then((data) => rnb_populate(JSON.parse(data.body)));
}

function rnb_populate(data){
    console.log(data.hits.hits[0]._source)
    content = data.hits.hits[0]._source;

    document.querySelector('.rnb-title').innerHTML = content.name    
    document.querySelector('.rnb-image').style.backgroundImage = 'url("'+content.images.image_16_9_s+'")'
    document.querySelector('.rnb-date').innerHTML = content.conditions.forecast.last_updated
    document.querySelector('#rnb-wheater-info').innerHTML = content.conditions.forecast.today.top.symbol.name
    document.querySelector('.rnb-snow .value').innerHTML = content.conditions.forecast.today.top.snow.depth_slope
    document.querySelector('.rnb-temperature .value').innerHTML = content.conditions.forecast.today.top.temperature.value
    document.querySelector('.rnb-wind .value').innerHTML = content.conditions.forecast.today.top.wind.mps

}
