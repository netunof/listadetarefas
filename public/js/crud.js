//snippet
// var container = $("article");//gambiarra menos feia que a anterior

//         if (!container.is(e.target) && container.has(e.target).length === 0)
//         {
//             $(container).hide();
//         }
//         return false;
//snippet


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//===========================================ABRIR E FECHAR===========================================
$(function () { //document.ready
    //fechar geral
    $(".fechar").on("click", function () {
        $('.modal').hide();
        $("#tagsTarefa").children().remove();
        $("#usersTarefa").children().remove();
        return false;
    });

    //abrir modal de criação
    $(".botNovaTarefa").on("click", function () {
        let id = $(this).val();
        $('#modalAdd').show();
        return false;
    });

    //abrir modal de gerenciamento de tags
    $("#botModalTag").on("click", function () {
        $("#modalTags").show();
        return false;
    });

    //abrir modal lixeira
    $("#botModalLixeira").on("click", function () {
        $("#modalLixeira").show();
        return false;
    });

    //abrir modal filtros
    $("#botModalFiltros").on("click", function () {
        $("#modalfiltrosbox").show();
        return false;
    });

    //abrir formulário de criação de tags
    $("#botCreateTag").on("click", function () {
        $('#botCreateTag').hide();
        $('#tagInput').show();
        return false;
    });
    //abrir input de tag
    $(".botEditarTag").on("click", function () {
        let id = $(this).val();
        $(this).hide();
        $("#formUpdateTag"+id).show();
        $("#tagTitulo"+id).hide();
        return false;
    });
    //abrir form de criar tag
    $("#botNovaTag").on("click", function () {
        $(this).hide();
        $("#formCreateTag").show();
        return false;
    });


//===========================================ABRIR E FECHAR===========================================

//================================================CRUD================================================
    //READ TAREFA
    $(".botInfoTarefa").on("click", function() {
        let id = $(this).val();
        $.ajax({
            type: "GET",
            url: "tarefas/"+id,
            data: id,
            success: function (response) {
                console.log(response);
                var users = "";
                var tags = "";
                $('#modalInfo').show();
                $('#nomeTarefa').text(response.tarefa.nome);
                $('#descricaoTarefa').text(response.tarefa.descricao);
                response.users.forEach(element => {
                    users += "<span>"+element.name+"</span>"+"<br>";
                });
                $("#usersTarefa").append(users);
                response.tags.forEach(element => {
                    tags += "<span>"+element.nome+"</span>"+"<br>";
                });
                $("#tagsTarefa").append(tags);
                $('#btnEditar').val(response.tarefa.id);
                $('#apagarTarefa').val(response.tarefa.id);
            }
        });
        return false;
    });
    //EDIT TAREFA
    $("#btnEditar").on("click", function () {
        let id = $(this).val();
        $.ajax({
            method: 'GET',
            url: '/tarefas/'+id,
            data: id,
            success: function(response) {
                var users = "";
                var tags = "";
                $('#modalEdit').show();
                $('#modalInfo').hide();
                $('#nomeEdit').val(response.tarefa.nome);
                $('#descricaoEdit').val(response.tarefa.descricao);
                response.users.forEach(element => {
                    users += "<span>"+element.name+"</span>"+"<br>";
                });
                $("#usersTarefa").append(users);
                response.tags.forEach(element => {
                    tags += "<span>"+element.nome+"</span>"+"<br>";
                });
                $("#tagsTarefa").append(tags);
                $('#btnUpdate').val(response.tarefa.id);
                $('#formUpdate').attr('action', 'tarefas/'+response.tarefa.id);
            }
        });
        return false;
    });

    //ENVIA A TAREFA PRA LIXEIRA
    $(document).on("click", "#apagarTarefa", function () {
        let id = $(this).val();
        if(confirm("Deseja enviar o tarefa para a lixeira?") == true){
            $.ajax({
                method: 'DELETE',
                url: "tarefas/"+id,
                data: {
                    "id": id,
                },
                success: function(result) {
                    location.reload();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(jqXHR.responseText);
                }
            });
        }
        return false;
    });

    //ELIMINA A TAREFA
    $(document).on("click", ".botEliminarTarefa", function () {
        let id = $(this).val();
        if(confirm("Deseja apagar definitivamente?") == true){
            $.ajax({
                method: 'DELETE',
                url: "apagados/"+id,
                data: {
                    "id": id,
                    _method: 'DELETE',

                },
                success: function() {
                    $("#lixo"+id).hide();
                },
                error: function(jqXHR, testStatus, error) {
                    // console.log(jqXHR.responseText);
                    console.log(testStatus);
                    console.log(error);
                }
            });
        }
        return false;
    });

    //RESTAURA A TAREFA
    $(document).on("click", ".botRestaurarTarefa", function () {
        let id = $(this).val();
        $.ajax({
            method: 'POST',
            url: "apagados/"+id,
            data: {
                "id": id,
            },
            success: function(result) {
                location.reload();
            },
            error: function(jqXHR, testStatus, error) {
                // console.log(jqXHR.responseText);
                console.log(testStatus);
                console.log(error);
            }
        });
        return false;
    });

    //CREATE TAG
    $("#tagCreate").on("click", function (event) {
        $.ajax({
            method: "POST",
            url: "tags/",
            data: {
                nome: $("#nomeNovaTag").val(),
            },
            success: function(result) {
                location.reload();
            },
            error: function(jqXHR, testStatus, error) {//remover após debug
                console.log(jqXHR.responseText);
                console.log(testStatus);
                console.log(error);
            }
        });
        return false;
    });

    //UPDATE TAG
    $(document).on("click", ".updateTag", function () {
        let id = $(this).attr('data-value');
        $("#formUpdateTag"+id).hide();
        $("#tagTitulo"+id).text($("tagInput"+id).val()).show();
        return false;
    });

    //DELETE TAG
    $(document).on("click", ".botDeleteTag", function () {
        let id = $(this).val();
        if(confirm("Deseja apagar o tag?") == true){
            $.ajax({
                method: "POST",
                url: "tags/"+id,
                data: {
                    id: id,
                    _method: "DELETE",
                },
                success: function(result) {
                    $("#tag"+id).hide();
                },
                error: function(jqXHR, testStatus, error) {//remover após debug
                    console.log(jqXHR.responseText);
                    console.log(testStatus);
                    console.log(error);
                }
            });
        }
        return false;
    });
});
//================================================CRUD================================================
