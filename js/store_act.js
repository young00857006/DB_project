function delete_funiture(fid,sid){

}
function edit_funiture(click_item){
    console.log("edit");
    console.log(click_item.parents("tr")[0].id);
}
function post_funiture(){//新增家具
    var obj = {};
    obj["fId"] = $("#post_fid").val();
    obj["type"] = $("#post_type").val();
    obj["color"] = $("#color").val();
    obj["material"] = $("#post_material").val();
    obj["supId"] = $("#post_sid").val();
    //obj["sId"] = <?php echo '"'.$user.'";';?>
    console.log(obj);

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
            console.log("edit");
            $("#edit_amount").val(click_item.eq(0).text());
            $("#edit_fid").val(click_item.eq(1).text());
            $("#edit_type").val(click_item.eq(2).text());
            $("#edit_color").val(click_item.eq(3).text());
            $("#edit_material").val(click_item.eq(4).text());
            $("#edit_sid").val(click_item.eq(5).text());
            
            $("#edit_save_btn").click(function(){
                edit_funiture(click_item);
            });
        });
        $(".delete").click(function(e){
            var click_item_fid = $(e.target).parents("tr").id;
           
            console.log(click_item_fid);
            $("#delete_confirm_btn").click(function(){//刪除此家具
                delete_funiture(click_item_fid);
            });
        });
    });
}

$("document").ready(function(){

    console.log("start");
    //將供應商填入列表
    
    show_all_funiture();
    $("#post_confirm_btn").click(function(){
        post_funiture();
        location.reload();
    });
    
    $(".search-box").focusout(function(){
        console.log($("#search_val").val());
    });
    $("#sign_out_btn").click(function(){
        if (confirm('您是否要登出') == true) {
            $(window).attr('location','index.html');
        }
    });
});