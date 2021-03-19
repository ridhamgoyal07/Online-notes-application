$(function(){

	var activenote = 0 ;
	var editMode = false;
	//load notes on page load : ajax call to loadnotes.php

	$.ajax({
		url: "loadnotes.php" , 
		success : function(data){
			$("#notes").html(data);
			clickonnote();
			clickondelete();

		} ,
		error: function(){
			$("#alert").toggleClass('collapse');
					$("#alertcontent").text("Their is issue with database connectivity. Try Again!");
					$("#alertcontent").fadeIn();
		}
	});

	// clicking add notes button
	$("#addnotes").click(function(){
		$.ajax({
			url: "createnotes.php",
			success: function(data){
				if(data == 'error'){
					$("#alert").toggleClass('collapse');
					$("#alertcontent").text("Their is issue in inserting note in database!");
					$("#alertcontent").fadeIn();
				}else{
					activenote = data;
					$("textarea").val("");
					// window.alert(activenote);
					// show  hide element
					showHide(["#notepad","#allnotes"], ["#notes" , "#addnotes","#edit" , '#done']);
					$("textarea").focus();
				}
			}
		});
	});

	//clicking all notes button
	$("#allnotes").click(function(){
		$.ajax({
			url: "loadnotes.php" , 
			success : function(data){
				$("#notes").html(data);
				clickonnote();
				clickondelete();
				showHide(["#notes","#addnotes","#edit"], ["#allnotes" , "#notepad",'#done']);

			} ,
			error: function(){
				$("#alert").toggleClass('collapse');
				$("#alertcontent").text("Their is issue with database connectivity. Try Again!");
				$("#alertcontent").fadeIn();
			}
		});
	});

	// ajax call to updatenotes.php the notes content
	$("textarea").keyup(function(){
		//ajax call to update the content of id active note
		$.ajax({
			url: "updatenotes.php" , 
			type:"POST",
			// we need to send the notes content with its id
			data: {notes:$(this).val(), id:activenote},
			success : function(data){
				if(data == 'error'){
					$("#alert").toggleClass('collapse');
					$("#alertcontent").text("Their is issue in updating your the note in database. Try Again!");
					$("#alertcontent").fadeIn();
				}
			} ,
			error: function(){
				$("#alert").toggleClass('collapse');
				$("#alertcontent").text("Their is issue with Ajax call. Try Again!");
				$("#alertcontent").fadeIn();
			}
		});

	});

	//click on the edit button
	$("#edit").click(function(){
		editMode = true;
		$(".noteheader").addClass("col-8 col-md-10");
		showHide(["#done" , ".delete"],["#edit"]);
	});

	// function to click on note to update 
	function clickonnote(){
		$(".noteheader").click(function(){
			if(!editMode){
				//update activenote variable to id of note
				activenote = $(this).attr("id");
				// fill text area

				$("textarea").val($(this).find(".text").text());
				showHide(["#notepad","#allnotes"], ["#notes" , "#addnotes","#edit" , '#done']);
				$("textarea").focus();
			}
		});
	}

	// click on done after deleting
	$("#done").click(function(){
		editMode = false;
		$(".noteheader").removeClass("col-8 col-md-10");
		showHide(["#edit"],[this , ".delete"]);
	});

	// function to click on delete button
	function clickondelete(){
		$(".delete").click(function(){
			var deletebutton = $(this); 
			$.ajax({
				url: "deletenotes.php",
				type: "POST",
				data: {id: deletebutton.next().attr("id")},
				success: function(data){
					if(data=='error'){
						$("#alert").toggleClass('collapse');
						$("#alertcontent").text("Their is issue in deleting note. Try Again!");
						$("#alertcontent").fadeIn();
					}else{
						deletebutton.parent().remove();
					}

				},
				error: function(){
					$("#alert").toggleClass('collapse');
					$("#alertcontent").text("Their is issue with Ajax call. Try Again!");
					$("#alertcontent").fadeIn();
				}

			});
		});
	}
	// functions to show or hide elements
	function showHide(array1 , array2){
		for(var i=0;i < array1.length; i++){
			$(array1[i]).removeClass('d-none');
			$(array1[i]).addClass("d-block"); 
			// $(array1[i]).addClass('d-block');

		}
		for(var i=0;i < array2.length; i++){
			$(array2[i]).removeClass('d-block');
			$(array2[i]).addClass("d-none"); 
		}
	}


});