$(function($){
   $(".maskData").mask("99/99/9999");
   $(".phone").mask("(999) 999-9999");
   $(".tin").mask("99-9999999");
   $(".ssn").mask("999-99-9999");
});

function ampliarImagem(itemImg)
{
    var data = '<div style=" width: 80%; height: 100%;" align="center"><img alt='+itemImg+' title='+itemImg+' height=100% src=/dam/getimage_LIM.php?id='+itemImg+'&size=1 ></div>';
    $('#recebeFancyZoom').html(data);
    $.colorbox({inline:true, href:"#recebeFancyZoom", transition:"none", opacity: "0.50", width:"75%", height:"75%"});     
}

function ampliarImagemBloco(itemImg)
{
    var data = '<div style=" width: 80%; height: 100%;" align="center"><img alt='+itemImg+' title='+itemImg+' height=100% src=/dam/getimage_LIM.php?id='+itemImg+'&size=1 ></div>';
    $('#recebeFancyZoomBloco').html(data);
    $.colorbox({inline:true, href:"#recebeFancyZoomBloco", transition:"none", opacity: "0.50", width:"75%", height:"75%"});     
}

/**
 * --Funcao que valida formulario--
 *   COMO UTILIZAR:
 * - Obrigar preenchimento: adicionar tag class="obrigatorio" no elemento html a ser validado
 * - Msg de aviso: adicionar tag title="Nome do campo" no elemento html a ser validado
 * - Impressão da imagem: criar uma div em qualquer ponto do codigo onde devem ser mostradas as msgs,
 *   @exemplo: <div id="alertas" style="background: none repeat scroll 0% 0% rgb(226, 226, 226); color: rgb(255, 0, 0);"></div>
 *
 *   COMO APLICAR NO CHtml::ajaxSubmitButton() do Yii:
 *   - Dentro da widget incluir:
 *   @exemplo: 'beforeSend' => 'function() {return validarFormulario();}
 */
function validarFormulario(id)
{
    var i = 0;
    var currentName;
    var nObj = 0;
    var alertas = '';

    //valida apenas os itens classificados como obrigatorios
    $('#formulario_' + id + ' .obrigatorio').each
    (
        function()
        {
            var name = $(this).attr('name');
            var title = $(this).attr('title');

            //valida cada name apenas uma vez
            if (name != currentName)
            {
                nObj++;
                currentName = name;

                var value = $(this).attr('value');
                var type = $(this).attr('type');
                var value1 = "";

                switch (type)
                {
                    case 'text':
                        if (!value || value == '')
                        {
                            alertas += "O campo " + title + " &eacute; obrigat&oacute;rio<br>"
                            $(this).addClass("borderRed");
                        } else {
                            $(this).removeClass("borderRed");
                            i++;
                        }
                        break;

                    case 'radio':
                        //retorna a opcao selecionada
                        value1 = $("input[name=" + name + "]:checked").val();
                        if (value1 == "" || !value1)
                        {
                            alertas += "Escolha uma das op&ccedil;&otilde;es em " + title + "<br>";
                            $(this).parents("div").addClass("borderRed");
                        } else {
                            $(this).parents("div").removeClass("borderRed");
                            i++;
                        }
                        break;

                    case 'select':
                        //retorna a opcao selecionada
                        value1 = $("select[@title=" + title + "]").val();
                        if (value1 == "" || !value1) {
                            alertas += "Escolha uma op&ccedil;&atilde;o em " + title + "<br>";
                            $(this).addClass("borderRed");
                        } else {
                            $(this).removeClass("borderRed");
                            i++;
                        }
                        break;

                    case 'textarea':
                        value1 = $(this).val();
                        if (value1 == "" || !value1) {
                            alertas += "O campo " + title + " &eacute; obrigat&oacute;rio<br>"
                            $(this).addClass("borderRed");
                        } else {
                            $(this).removeClass("borderRed");
                            i++;
                        }
                        break;

                    default:
                        value1 = $(this).val();
                        if (value1 == "" || !value1) {
                            alertas += "O campo " + title + " &eacute; obrigat&oacute;rio<br>"
                            $(this).addClass("borderRed");
                        } else {
                            $(this).removeClass("borderRed");
                            i++;
                        }
                        break;
                }
            }
        }
            )
    if (i == nObj)
    {
        return true;
    }
    else
    {

        $("#alertas_" + id).html(alertas).fadeIn(500);
        alertas = "";
        $(window).scrollTop(0);
        return false;
    }
}
/** Oculta itens marcados em um formulario */
function ocultarItensMarcados() {
    //pega todos os valores marcados no formulario
    var inputs = $('input:checked').map(function() {
        return $(this).attr('id');
    });
    //percorre o array de itens e oculta todos
    for (var i = 0; i < inputs.length; i++) {
        $("#item"+inputs[i]+" input").attr("checked", false);
        $("#item"+inputs[i]+" input").hide();
    }
}

/** reload em um pagina */
function atualizar_pagina() {
    window.opener.location.reload();
    javascript:self.close();
}
/** Fechar popup ou pagina */
function cancelar_voltar() {
    javascript:self.close();
}
