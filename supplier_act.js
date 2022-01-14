function delete_supplier(supId){

}
function edit_supplier(click_item){
    console.log("edit");
    console.log(click_item.parents("tr")[0].id);
}
function post_supplier(){//新增供應商
    var obj = {};
    obj["fId"] = $("#post_fid").val();
    obj["type"] = $("#post_type").val();
    obj["color"] = $("#color").val();
    obj["material"] = $("#post_material").val();
    obj["supId"] = $("#post_sid").val();
    //obj["sId"] = <?php echo '"'.$user.'";';?>
    console.log(obj);

}
function show_all_supplier(){
    var url = "php-furnitureAPI/query_API.php";
    $("#supplier_list").html("");
    $.getJSON(url,function(result){
        $.each(result,function(index,value){
            var insertHTML = "";
            insertHTML += `
            <tr id = "first">
                <td></td>
                <td>${value.supId}</td>
                <td>${value.supAdder}</td>
                <td>${value.supPhone}</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
            `;
            $("#supplier_list").append(insertHTML);
        });
        $(".edit").click(function(e){//編輯供應商
            var click_item = $(e.target).parents("tr").children('td');
            console.log("edit");
            $("#edit_supid").val(click_item.eq(1).text());
            $("#edit_supAdder").val(click_item.eq(2).text());
            $("#edit_supPhone").val(click_item.eq(3).text());
            
            $("#edit_save_btn").click(function(){
                var obj = {};
                obj.supid = $("#edit_supid").val();
                obj.supAdder = $("#edit_supAdder").val();
                obj.supPhone = $("#edit_supPhone").val();
                edit_supplier(click_item);
            });
        });
        $(".delete").click(function(e){
            var click_item_fid = $(e.target).parents("tr").id;
           
            console.log(click_item_fid);
            $("#delete_confirm_btn").click(function(){//刪除此供應商
                delete_supplier(click_item_fid);
            });
        });
    });
}

$("document").ready(function(){

    console.log("start");
    //將供應商填入列表
    
    show_all_supplier();
    $("#post_confirm_btn").click(function(){
        post_supplier();
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