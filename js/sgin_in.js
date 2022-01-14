$("document").ready(function(){
    $("#sign_in_btn").click(function(){
        var Merchant = "";
        sessionStorage.setItem('Merchant', "ssss");
        console.log("sss");
        var sid = $("input[name='username']").val();
        var sPhone = $("input[name='password']").val();

        $.ajax({ 
            type: "POST",
            url: "http://127.0.0.1:5000/DB/updateStatus", 
            data:sid,
            success: function(re){
                //console.log(data);
                //$("#"+removeID).remove();
                if(re.sPhone == sPhone){
                    $(window).attr('location','merchant.html');
                }
                else{
                    alert("名稱或電話錯誤，請重新嘗試。");
                }
                
            },
            error: function (thrownError) {
                alert(thrownError);
            }
        });
        
    });
    $("#sign_up_btn").click(function(){
        var store = {};
        store.sId = $("#store_name").val();
        store.sAdder = $("#store_name").address();
        store.sPhone = $("#store_name").phone();
        $.post("insert_API.php", store)
            .done(function (data) {
                window.alert(data);
            });
    });
});