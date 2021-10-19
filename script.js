$(document).ready(function () {
    showdata();

    $("#clearbtn").click(function (e) { 
        e.preventDefault();
        $("#adduserform")[0].reset();
    });

    $("#editclearbtn").click(function (e) { 
        e.preventDefault();
        $("#edituserform")[0].reset();
    });

    //Delete Record
    $('tbody').on("click",".Deletebtn", function () {
        let uid = $(this).data('uid');
        let uimg = $(this).data('userimg');
        $.ajax({
            type: "POST",
            url: "backphp/delete.php",
            data: {
                userid : uid,
                userimg:uimg
            },
            success: function (data) {
                if(data == 1){
                    showdata();
                }else{
                    showdata();
                }
            }
        });
    });


    //Inser Record
    $("#adduserform").submit(function (e) { 
        e.preventDefault();
        var formdata = new FormData(this);
        
        $.ajax({
            type: "POST",
            url: "backphp/insert.php",
            data:formdata,
            contentType:false,
            processData:false,
            success: function (data) {
                if(data == 1){
                    $("#adduserform")[0].reset();
                    $("#Addusermodal .close").click()
                    showdata();
                }else{
                    alert(data);
                }
            }
        });

    });


    // Getdata Record
    $('tbody').on("click",".Editbtn", function () {
        let uid = $(this).data('uid');
        $.ajax({
            type: "POST",
            url: "backphp/update.php",
            data: {
                userid : uid,
                update : "getdata"
            },
            dataType:"JSON",
            success: function (data) {

                $("#id").val(data.Id);
                $("#edit_name").val(data.Name);
                $("#edit_email").val(data.Email);
                $("#edit_phone").val(data.Phone);
                $("#edit_age").val(data.Age);
                $("#edit_gender").val(data.Gender);
                $("#edit_address").val(data.Address);
                $("#preview_img").attr("src", "upload/"+data.Photo);
                $("#old_photo").val(data.Photo);
            }
        });
    });


    //Edit Record 
    $("#edituserform").submit(function (e) { 
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append('update','update');

        $.ajax({
            type: "POST",
            url: "backphp/update.php",
            data:formdata,
            contentType:false,
            processData:false,
            success: function (data) {
                if(data == 1){
                    $("#edituserform")[0].reset();
                    $("#Editusermodal .close").click()
                    showdata();
                }else{
                    alert(data);
                }
            }
        });

    });


    // Retrive Data From database
    function showdata(){
        var output = '';
        $.ajax({
            type: "GET",
            url: "backphp/retrive.php",
            dataType: "JSON",
            success: function (data) {
                if(data != 0){
                    for (let i = 0; i < data.length; i++) 
                    {
                        output += '<tr>'
                        +'<td>'+(i+1)+'</td>'
                        +'<td>'+ data[i].Name +'</td>'
                        +'<td>'+ data[i].Email +'</td>'
                        +'<td>'+ data[i].Phone +'</td>'
                        +'<td>'+ data[i].Age +'</td>'
                        +'<td>'+ data[i].Gender +'</td>'
                        +'<td><img src="upload/'+ data[i].Photo +'" alt="img" class="photoimg"></td>'
                        +'<td>'+ data[i].Address +'</td>'
                        +'<td><button class="btn btn-outline-primary btn-sm mr-1 Editbtn" data-toggle="modal" data-target="#Editusermodal" data-uid="'+ data[i].Id +'"><small><i class="fa fa-pencil-square-o" aria-hidden="true"></i></small></button>' 
                        +'<button class="btn btn-outline-danger btn-sm Deletebtn" data-uid="'+data[i].Id+'" data-userimg="'+data[i].Photo+'"><small><i class="fa fa-trash-o" aria-hidden="true"></i></small></button>'
                        +'</tr>';
                    }
                }else{
                    output += "";   
                }
                $("#showtable").html(output);
            }
        }); 
    }



});