$(document).ready(function() {
	$(".alert").hide();
	dataTable();

	$('.divLoader').hide();
});

function dataTable(){
    $('#example').DataTable({
    	responsive:true
    });
}

function submitData(form, page, event){
	event.preventDefault();
	var url = 'modul/'+page+'/proses.php';
	$('.divLoader').show();
	$.post(url, $('#'+form).serialize()).done(function(data){
		$('.divLoader').hide();
		var json 	= jQuery.parseJSON(data);
		var alert 	= "alert"+json[2];
		if(json[2] == 'Tambah'){
			if(json[0] == '1'){
				alertPanel('success', alert, json[1]);
				$('#'+form)[0].reset();
				console.log(page);
				if(page == 'template'){
					$('#roleDiv').html('');
				}
			}else{
				alertPanel('danger', alert, json[1]);
			}
		}else{
			$(".modal").modal("hide");
			if(json[0] == '1'){
				alertPanel('success', "alertMain", json[1]);
				$('#'+form)[0].reset();
			}else{
				alertPanel('danger', "alertMain", json[1]);
			}
		}

		loadFile('modul/'+page+'/inc/refreshTable.php', 'tbody');
	});
}

function alertPanel(style, alertID, msg){
	if($("#"+alertID).hasClass("alert-danger")){
		$("#"+alertID).removeClass("alert-danger");
	}else if($("#"+alertID).hasClass("alert-success")){
		$("#"+alertID).removeClass("alert-success");
	}

	$("#"+alertID).addClass("alert-"+style);
	$("#"+alertID+" #alertText").html(msg);
	$("#"+alertID).show();
}

function selectRecord(idInput, ket){
	$("#input").val(idInput);
	$("#ket").val(ket);
	$(".tr").css("background","#343a40");
	$("#tr"+idInput).css("background","grey");
}

function openModal(tipe, page = ''){
	var input 	= $('#input').val();
	var ket 	= $('#ket').val();

	if(input != ''){
		if(tipe == 'Edit'){
			loadFile('modul/'+page+'/inc/edit.php?id='+input, 'editBody');
		}else if(tipe == 'Lihat'){
			loadFile('modul/'+page+'/inc/edit.php?id='+input+"&lihat=1", 'lihatBody');
		}else{
			$('#innerHapus').html("Hapus data "+ket+"..??");
		}

		$('#id'+tipe).val(input);
		$('#modal'+tipe).modal("show");
		$('.alert').hide();
		selectRecord('');
	}else{
		alertPanel("danger","alertMain","Pilih record terlebih dahulu..!!");
	}
}

function loadFile(url, target){
	$("#"+target).load(url);
}

function getRandomColor() {
	var letters = '0123456789ABCDEF';
	var color = '#';
	for (var i = 0; i < 6; i++) {
	  color += letters[Math.floor(Math.random() * 16)];
	}
	return color;
}

function showParent(value){
	if(value == '2'){
		$("#divParent").show();
	}else{
		$("#divParent").hide();
	}
}

function chart(dataBar, tipe, judul){
	var ctx = document.getElementById('canvas').getContext('2d');
	window.myBar = new Chart(ctx, {
		type: tipe,
		data: dataBar,
		options: {
			title: {
			  display: true,
			  fontSize: 18,
			  text: [judul]
			},
			responsive: true,
			legend: {
			  display: true,
			  position: 'bottom'
			},
			barValueSpacing: 10,
			scales: {
			  yAxes: [{
			    ticks: {
			      beginAtZero: true,
			      min: 0,
			    }
			  }],
			  xAxes: [{
			    ticks: {
			      beginAtZero: true,
			      min: 0,
			    }
			  }],
			}
		}
	});
}

function createDataBar(labelText, raw, tipe = 0){
	var labelData 	= raw['label'];
	var rawData 	= raw['data'];
	var dataBar = {
		labels: [],
		datasets: []
	};
	var objects 	= {};
	var datasets 	= [];

	switch(tipe){
		case 0:
			for(var i=0;i<labelData.length;i++){
				objects[i] = {
					label: labelData[i],
					backgroundColor: getRandomColor(),
					data: [rawData[i]]
				};
			}

			$.each(objects, function(index, value) {
				datasets.push(value);
			});

			dataBar.labels.push(labelText);
			$.each(datasets, function(index, value){
				dataBar.datasets.push(value);
			});
			break;
		case 1:
			objects = {
				label: labelText,
				backgroundColor: [],
				data: []
			}

			$.each(rawData, function(index, value){
				objects.backgroundColor.push(getRandomColor());
				objects.data.push(value);
			});
			
			$.each(labelData, function(index, value){
				dataBar.labels.push(value);
			});
			dataBar.datasets.push(objects);
			break;
	}
	return dataBar;
}