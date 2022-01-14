<?php
    session_start();  //很重要，可以用的變數存在session裡
    $user=$_SESSION["sId"];
    if(!$user){
		header("location:HomePage.php");
	}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>家具管理登入介面</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/store.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>//store_act.js
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
<script>
	function delete_funiture(fid,sid){
		let obj = {};
		obj["fId"] = fid;
		obj["sId"] = sid;
		$.post("php-furnitureAPI/delete_API.php", obj)
			.done(function (data) {
				window.alert(data);
			});
}
function edit_funiture(obj){
    $.post("php-furnitureAPI/update_API.php", obj)
		.done(function (data) {
			window.alert(data);
		});
}
function post_funiture(){//新增家具
    let obj = {};
    obj["fId"] = $("#post_fid").val();
    obj["type"] = $("#post_type").val();
    obj["color"] = $("#post_color").val();
    obj["material"] = $("#post_material").val();
    obj["supId"] = $("#post_supId").val();
	obj["amount"] = $("#post_amount").val();
    obj["sId"] = <?php echo '"'.$user.'";';?>
    console.log(obj);
	$.post("php-furnitureAPI/insert_API.php", obj)
		.done(function (data) {
			window.alert(data);
		});
}
function show_all_funiture(){
    var url = "php-furnitureAPI/query_API.php";
    $("#Merchant_list").html("");
    $.getJSON(url,function(result){
        $.each(result,function(index,value){
            var insertHTML = "";
            insertHTML += `
            <tr id = "${value.fId}">
						<td>${value.amount}</td>
						<td>${value.fId}</td>
						<td>${value.type}</td>
						<td>${value.color}</td>
						<td>${value.material}</td>
						<td>${value.supId}</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
            </tr>
            `;
            $("#Merchant_list").append(insertHTML);
        });
        $(".edit").click(function(e){//編輯家具
            var click_item = $(e.target).parents("tr").children('td');
            $("#edit_amount").val(click_item.eq(0).text());
            $("#edit_fid").val(click_item.eq(1).text());
            $("#edit_type").val(click_item.eq(2).text());
            $("#edit_color").val(click_item.eq(3).text());
            $("#edit_material").val(click_item.eq(4).text());
            $("#edit_supId").val(click_item.eq(5).text());
            $("#edit_save_btn").click(function(){
				var obj = {};
				obj["fId"] = $("#edit_fid").val();
				obj["type"] = $("#edit_type").val();
				obj["color"] = $("#edit_color").val();
				obj["material"] = $("#edit_material").val();
				obj["amount"] = $("#edit_amount").val();
				obj["supId"] = $("#edit_supId").val();
            	obj["sId"] = <?php echo '"'.$user.'";';?>
                edit_funiture(obj);
            });
        });
		$(".delete").click(function(e){
            var click_item_fid = $(this).prev().parents("tr").eq(0).attr('id');
			var sid = <?php echo '"'.$user.'";';?>
            console.log(click_item_fid);
            $("#delete_confirm_btn").click(function(){//刪除此家具
                delete_funiture(click_item_fid,sid);
            });
        });
    });
}

$("document").ready(function(){

    console.log("start");
    //將供應商填入列表
	$("#edit_supId").html("");
	$("#post_supId").html("");
	$.getJSON("php-publisher/publisherQuery_API.php", function (data) {
		$.each(data,function(index,value){
			var inset_sup = `<option value="${value.supId}">${value.supId}</option>`;
			$("#edit_supId").append(inset_sup);
			$("#post_supId").append(inset_sup);
		});
	});
    
    show_all_funiture();
    $("#post_confirm_btn").click(function(){
        post_funiture();
		location.reload(true);
    });
    $(".search-box").focusout(function(){
        console.log($("#search_val").val());
    });
    $("#sign_out_btn").click(function(){
        if (confirm('您是否要登出') == true) {
         $(window).attr('location','php-member/logout.php');
		}
    });
});
</script>
</head>
<body>
<div class="container-xl">
	<div class="search-box">
		<i class="material-icons">&#xE8B6;</i>
		<input type="text" class="form-control" id = "search_val" placeholder="以編號搜尋&hellip;">
	</div>
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>家具 <b>管理</b></h2>
					</div>
					<div class="col-sm-6">
						<button class="btn btn-info" id = "sign_out_btn">登出</button>
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>新增家具</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>數量</th>
						<th>家具名稱</th>
						<th>種類</th>
						<th>顏色</th>
						<th>材質</th>
						<th>供應商</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody id = "Merchant_list">
					<tr id = "first">
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>(171) 555-2222</td>
						<td>
							<a id = "swe" href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="options[]" value="1">
								<label for="checkbox3"></label>
							</span>
						</td>
						<td>Maria Anders</td>
						<td>mariaanders@mail.com</td>
						<td>25, rue Lauriston, Paris, France</td>
						<td>(503) 555-9931</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
						</td>
						<td>Fran Wilson</td>
						<td>franwilson@mail.com</td>
						<td>C/ Araquil, 67, Madrid, Spain</td>
						<td>(204) 619-5731</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>					
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
						<td>Martin Blank</td>
						<td>martinblank@mail.com</td>
						<td>Via Monte Bianco 34, Turin, Italy</td>
						<td>(480) 631-2097</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                    
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- ADD Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">新增家具</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>家具名稱</label>
						<input id  = "post_fid" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>種類</label>
						<input id  = "post_type" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>顏色</label>
						<input id  = "post_color" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>材質</label>
						<input id  = "post_material" type="text" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>數量</label>
						<input id  = "post_amount" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>供應商</label>
						<select id  = "post_supId" name="supplier" id="supplier">
							
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
					<input type="button" class="btn btn-success" id = "post_confirm_btn" value="新增">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">編輯家具</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>家具名稱</label>
						<input id  = "edit_fid"type="text" class="form-control" readonly="readonly" required>
					</div>
					<div class="form-group">
						<label>種類</label>
						<input id  = "edit_type" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>顏色</label>
						<input id  = "edit_color" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>材質</label>
						<input id  = "edit_material" type="text" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>數量</label>
						<input id  = "edit_amount" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>供應商</label>
						<select id  = "edit_supId" name="supplier" id="supplier">
						</select>
					</div>	
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
					<input type="submit" class="btn btn-info" id = "edit_save_btn" value="儲存">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">刪除家具</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>請問試問要刪除此家具？</p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
					<input type="submit" class="btn btn-danger" id = "delete_confirm_btn" value="刪除">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>