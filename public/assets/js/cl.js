function tabela()
{
	var intab = document.getElementById('tab').innerHTML;
	$("#tab").load('/load_tab', function(resp, st, xhr){
		var arr = JSON.parse(resp);
		var i = 0;
		document.getElementById('tab').innerHTML = intab;
		for (i=0;i<arr.length;i=i+1)
		{
			var row = document.createElement("TR");
			row.id = 'row'+arr[i].id;
			row.setAttribute('name',arr[i].lat+','+arr[i].lng);
			appendTD(row,arr[i].id);
			appendTD(row,arr[i].created_at);
			appendTD(row,getClasse(arr[i].classe));
			appendTD(row,getVolume(arr[i].volume));
			appendTD(row,'<img class="icond" src="deposito/'+arr[i].file+'"/>');
			appendTD(row,arr[i].end);
			appendTD(row,arr[i].user);
			appendTD(row,'<a onclick="showden(\''+row.id+'\')">link</a>');
			appendTD(row,arr[i].status);
			appendTD(row,'GOF <select><option>-</option><option>1</option><option>2</option><option>3</option></select>');
			appendTD(row,'<input type="button" value="Enviar"/>');
			document.getElementById('tab').appendChild(row);
		}
	});
}

function appendTD(el, str)
{
	var td = document.createElement('TD');
	td.innerHTML = str;
	el.appendChild(td);
}

function showden(rowid)
{
	var did = rowid.split('w')[1];
	var latlng = document.getElementById(rowid).getAttribute('name');
	var classe = document.getElementById(rowid).getElementsByTagName("TD")[2].innerHTML;
	var volume = document.getElementById(rowid).getElementsByTagName("TD")[3].innerHTML;
	var ts = document.getElementById(rowid).getElementsByTagName("TD")[1].innerHTML;
	var lnkimg = document.getElementById(rowid).getElementsByTagName("TD")[4].getElementsByTagName("IMG")[0].getAttribute('src').split('/')[1];
	window.open('/detalhar/'+did+'/'+latlng+'/'+classe+'/'+volume+'/'+ts+'/'+lnkimg);
}

function getVolume(opt)
{
	switch(opt)
	{
		case 1: return "Pequeno";
		case 2: return "Médio";
		case 3: return "Grande";
		default: return "n/a";
	}
}

function getClasse(opt)
{
	switch(opt)
	{
		case 1: return "Concreto";
		case 2: return "Ferro";
		case 3: return "Tijolos";
		case 4: return "Madeira";
		case 5: return "Gesso";
		case 6: return "Misto";
		default: return "Misto";
	}
}

function getMarkersInfo()
{
	var rows = document.getElementById('tab').getElementsByTagName('TR');
	var i=0;
	var j=0;
	var latlng = [];
	var classes = [];
	var volumes = [];
	var ids = [];
	for(i=1;i<rows.length;i++)
	{
		var coor = rows[i].getAttribute('name');
		var arr2 = coor.split(',');
		latlng[j] = arr2[0];
		latlng[j+1] = arr2[1];
		j = j + 2;
		ids[i-1] = rows[i].getElementsByTagName('TD')[0].innerHTML;
		classes[i-1] = rows[i].getElementsByTagName('TD')[2].innerHTML;
		volumes[i-1] = rows[i].getElementsByTagName('TD')[3].innerHTML;
	}
	return {coord: latlng, c: classes, v: volumes, id: ids};
}
var obj;
function plotmap()
{
	var tabcont = $("#tab").html();
	obj = getMarkersInfo();
	$("#tab").html('<div id="map" style="height:400px;width:80%;position:absolute;"><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqe-_j4Ith91UN-IP3ZF98Atcepzu-rqY&callback=initMap" async defer></script>');
}

function initMap()
{
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -8.0464433, lng: -34.9024341},
		zoom: 12
	});
	var arrcoord = obj.coord, cs = obj.c, vs = obj.v, ids = obj.id;
	i = 0;
	j = 0;
	for(i=0;i<cs.length;i=i+1)
	{
		var marker = new google.maps.Marker({
			position: {lat: Number(arrcoord[j]), lng: Number(arrcoord[j+1])},
			map: map,
			title: 'Den ' + ids[i] + ': ' + cs[i] + ', ' + vs[i]
		});
		j = j + 2;
	}
}