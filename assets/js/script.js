
function send(src, data){
    fetch("/handlers/" + src + ".php", {method: "post", body: data}).then(function(response){
        if(response.status === 200){
            return response.json();
        }else{
            alert("Нет доступа страницы или страницы не существует!");
        }
    }).then(function(res){
        if('error' in res){
            alert(res['error']);
        } else if('success' in res){
            location.href = "/";
            alert(res['success']);
        }
    }).catch(function(err){
        alert("Проверьте соединение с интернетом!");
    });
}

function printPage(block) {
    let printContents = document.querySelector(block).innerHTML;
    let originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

