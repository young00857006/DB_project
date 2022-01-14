function delete_supplier(supId){
    var obj = {};
    obj["supId"] = supId;
    console.log(supId);
    $.post("php-publisher/publisherDelete_API.php", obj)
			.done(function (data) {
				window.alert(data);
			});
    /*$.ajax({
        url : "php-publisher/publisherDelete_API.php",
        Type: "GET",
        dataType: "json",
        data: {supId : obj["supId"]},
        success: function (data) {
          console.log(data);
        }
    });*/
}
function edit_supplier(click_item){
    console.log("edit");
    var obj = {};
    obj.supid = $("#edit_supid").val();
    obj.supAdder = $("#edit_supAdder").val();
    obj.supPhone = $("#edit_supPhone").val();
    console.log(click_item.parents("tr")[0].id);
}
function show_all_supplier(){
    var url = "php-publisher/publisherQuery_API.php";
    $("#supplier_list").html("");
    $.getJSON(url,function(result){
        $.each(result,function(index,value){
            var insertHTML = "";
            insertHTML += `
            <tr id = "${value.supId}">
                <td></td>
                <td>${value.supId}</td>
                <td>${value.supAdder}</td>
                <td>${value.supPhone}</td>
                <td></td>
                <td>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
            `;
            //<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            $("#supplier_list").append(insertHTML);
        });
        /*$(".edit").click(function(e){//編輯供應商
            var click_item = $(e.target).parents("tr").children('td');
            console.log("edit");
            $("#edit_supid").val(click_item.eq(1).text());
            $("#edit_supAdder").val(click_item.eq(2).text());
            $("#edit_supPhone").val(click_item.eq(3).text());
            
            $("#edit_save_btn").click(function(){
                edit_supplier(click_item);
            });
        });*/
        $(".delete").click(function(e){
            var click_item_supId = $(e.target).parents("tr").eq(0).attr('id');
            console.log(click_item_supId);
            $("#delete_confirm_btn").click(function(){//刪除此家具
                delete_supplier(click_item_supId);
            });
        });
    });
}

$("document").ready(function(){

    console.log("start");
    //將供應商填入列表
    
    show_all_supplier();
    $(".search-box").focusout(function(){
        console.log($("#search_val").val());
    });
});