// Support search text
function getSelectionText() {
    var text = "";
    var activeEl = document.activeElement;
    var activeElTagName = activeEl ? activeEl.tagName.toLowerCase() : null;
    if (
      (activeElTagName == "textarea") || (activeElTagName == "input" &&
      /^(?:text|search|password|tel|url)$/i.test(activeEl.type)) &&
      (typeof activeEl.selectionStart == "number")
    ) {
        text = activeEl.value.slice(activeEl.selectionStart, activeEl.selectionEnd);
    } else if (window.getSelection) {
        text = window.getSelection().toString();
    }
    return text;
}
document.onmouseup = document.onkeyup = document.dblclick = document.onselectionchange = function() {
    fillDataSelected();
};

function fillDataSelected(){
    var textSelect = getSelectionText();
    var txtConvert = localStorage.getItem(textSelect);
    if(txtConvert == null){
        txtConvert = "";
    }
    if(textSelect.length > 0){
        $("#txtSelectText").val(textSelect);
    }
    popover.boxInit(textSelect, txtConvert, false);
}
var elementIsClickClose = false;
$("span[name='text']").mouseup(function(e) {
    var text = getSelectionText();

    $("#my-popover").css("top",e.pageY);
    $("#my-popover").css("left",e.pageX + 10);
    if(text.length == 0)
    {
        setTimeout(() => {
            if (!elementIsClickClose){
                $('[data-toggle="popover"]').popover('hide');
            }
        }, 10);

        elementIsClickClose = false;
    }
    else{
        elementIsClickClose = true;
        $('[data-toggle="popover"]').popover("show");
    }
})
// $("body").mouseup(function(e) {
//     if(!elementIsClickClose){
//         $('[data-toggle="popover"]').popover('hide');
//     }
//     elementIsClickClose = false;
// })
window.onload = function() {
  $('#txtSearch').focus();
  $("[data-toggle=popover]").popover({html:true})
};
// initialization
$(document).ready(function() {
    common.init();

});
var vars = {};
// common handle
const common = {
    init : function(){
        $(".img-crop > iframe").css('width', '100%');
        $(".img-crop > iframe").css('height', '380px');

        // get url prame
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        window.addEventListener('load', (event) => {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
        $( document ).ready(function() {
            setTimeout(() => {
                $(".se-pre-con").fadeOut("slow");
            }, 100);
        });
        storage.loadListWords();
        storage.bindText();
        popover.setToolTip();
        $('#sidebarCollapseWords').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        $('#sidebarCollapseUser').on('click', function () {
            $('#sideBarUser').toggleClass('active');
        });

        var page_num = 1
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()-10) {
                home.loadData(page_num);
                page_num ++;
            }
        });
    },
    getPostId(){
        var parts = window.location.href.split("/");
        var postId = parts[parts.length-1];
        return postId;
    }
}
const home ={
    loadData : function (page_num) {
        $(".form-loadding").addClass("show");
        var parts = window.location.href.split("/");
        var api = "/api/load/posts/" + page_num;
        if(parts[3] == "search"){
            api = "/api/search/" + page_num + "/" + $("input[name='key_search']").val();
        }
        console.log(parts[3]);
        var finish = $.ajax({
            type:'GET',
            url: api,
            async: false,
            success: function(data){
                if(data.posts != 'false'){
                    data.posts.forEach(myFunction);
                    function myFunction(item, index) {
                        var str_html = home.str_html_post(item.id, item.image_thumb, item.title, item.user_name, item.created_date);
                        if(parts[3] == "search"){
                            str_html = home.str_html_search_item(item.id, item.image_thumb, item.title, item.content_sub_text, item.user_name, item.created_date);
                        }
                        setTimeout(() => {
                            $(".form-data-posts").append(str_html);
                        }, 100);
                    }

                }
                return true;
            },
            error: function (error) {
                console.log(error);
                return false;
            }
        })
        $(".form-data-posts").ready(function() {
            $(".form-loadding").removeClass("show");
        });
    },
    str_html_post : function (id, image_thumb, title, user_name, created_date) {
        var str = "<div class=\"col-md-3 col-sm-6 col-xs-3 fbt-vc-inner post-grid clearfix\">\n" +
            "            <div class=\"post-item clearfix\">\n" +
            "                <div class=\"img-thumb\">\n" +
            "                    <a href=\"videos\\"+ id +"\">\n" +
            "                        <div class=\"fbt-resize\" style=\"background-image: url(/public/images/video_thumbs/"+ image_thumb +")\">\n" +
            "                        </div>\n" +
            "                    </a>\n" +
            "                </div>\n" +
            "                <div class=\"post-content\">\n" +
            "                    <a href=\"\\videos\\" + id + "\">\n" +
            "                        <h3>"+ title +" </h3>\n" +
            "                    </a>\n" +
            "                    <div class=\"post-info clearfix\">\n" +
            "                        <span><a href=\"#\">"+ user_name +"</a></span>\n" +
            "                        <span>-</span>\n" +
            "                        <span>" + created_date + "</span>\n" +
            "                        <span>-</span>\n" +
            "                        <span class=\"rating\">\n" +
            "                                                        <i class=\"fas fa-star\"></i>\n" +
            "                                                        <i class=\"fas fa-star\"></i>\n" +
            "                                                        <i class=\"fas fa-star\"></i>\n" +
            "                                                        <i class=\"fas fa-star-half-alt\"></i>\n" +
            "                                                        <i class=\"far fa-star\"></i>\n" +
            "                                                    </span>\n" +
            "                    </div>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "        </div>";

        return str;
    },
    str_html_search_item : function (id, image_thumb, title, content, user_name, created_date) {
        var str = "<div class=\"row\">\n" +
            "            <div class=\"col-md-3 col-sm-6 col-xs-3 fbt-vc-inner post-grid clearfix\">\n" +
            "                <div class=\"post-item clearfix\">\n" +
            "                    <div class=\"img-thumb\">\n" +
            "                        <a href=\"\\videos\\" + id + "\">\n" +
            "                            <div class=\"fbt-resize\" style=\"background-image: url(/public/images/video_thumbs/" + image_thumb + ")\">\n" +
            "                            </div>\n" +
            "                        </a>\n" +
            "                    </div>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "            <div class=\"col-md-9 col-sm-6 col-xs-9 fbt-vc-inner post-grid clearfix\">\n" +
            "                <div class=\"post-content\">\n" +
            "                    <a href=\"\\videos\\" + id + "\">\n" +
            "                        <h3>" + title + "</h3>\n" +
            "                    </a>\n" +
            "                    <div class=\"post-info clearfix\">\n" +
            "                        <span><a href=\"#\">" + user_name + "</a></span>\n" +
            "                        <span>-</span>\n" +
            "                        <span>" + created_date + "</span>\n" +
            "                        <span>-</span>\n" +
            "                        <span class=\"rating\">\n" +
            "                                <i class=\"fas fa-star\"></i>\n" +
            "                                <i class=\"fas fa-star\"></i>\n" +
            "                                <i class=\"fas fa-star\"></i>\n" +
            "                                <i class=\"fas fa-star-half-alt\"></i>\n" +
            "                                <i class=\"far fa-star\"></i>\n" +
            "                            </span>\n" +
            "                    </div>\n" +
            "                    <span name=\"content\">" + content + "</span>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "        </div>";

        return str;
    }
}

const popover ={
    boxShow : function(txtContent){
        elementIsClickClose = true;
        var txtDescription = localStorage.getItem(txtContent).split('.')[2];
        popover.boxInit(txtContent, txtDescription, true);
        $('[data-toggle="popover"]').popover("show");
    },
    boxInit : function(txtContent, txtDescription, isUpdate){
        if(txtContent.length > 0){
            var str_html_btn_del = "  <button id='btnDelete' onclick='popover.boxDelete(\"" + txtContent + "\")'>"
                               + "  <i class='fas fa-trash'></i>"
                               + "</button>";
            var str_html_box_new = txtContent
            + "  <a class='search' href='https://mazii.net/search?dict=javi&type=w&query="+ txtContent +"&hl=en-US' target='_blank' title='Search mazii'>"
            + "  <i aria-hidden='true' class='fa fa-search'></i>mazii</a>"
            + "  <button class=\"ml-2 mb-1 close\" type=\"button\" name=\"close\" onclick=\"$(&quot;#my-popover&quot;).popover(&quot;hide&quot;);\"><span aria-hidden=\"true\">×</span></button>"
            + "  <input type='text' class='form-control' id='txtDescription' value='" + txtDescription + "' >"
            + "     <button id='btnSave' onclick='popover.boxSave(\"" + txtContent + "\"," + isUpdate + ")'>"
            + "     <i class='fas fa-save'></i>"
            + "     </button>";
            var str_html_box = str_html_box_new;
            if(isUpdate){
                str_html_box = str_html_box_new + str_html_btn_del;
            }
            $("#my-popover").removeAttr("data-content");
            $("#my-popover").attr("data-content",str_html_box
            );

        }
    },
    boxSave : function(txtContent, isUpdate){
        if(txtContent.length > 0){
            var txtDescription = $('#txtDescription').val();
            if(txtDescription.length == 0){
                return false;
            }
            $('[data-toggle="popover"]').popover('hide');

            var postId = common.getPostId();

            var word_id = 0;
            if(isUpdate){
                word_id = localStorage.getItem(txtContent).split('.')[2];
            }
            $.ajax({
                type:'POST',
                url:'/videos/post',
                data:{ word_content : txtContent, word_description : txtDescription, post_id : postId, id : word_id , is_update : isUpdate},
                success:function(data){
                    if(isUpdate === false){
                        // case when new text now mark text//
                        localStorage.setItem(txtContent, data.id + "." + postId + "." +txtDescription);
                        popover.markText(txtContent);
                        popover.setToolTip();

                    }
                    else{
                        localStorage.setItem(txtContent, word_id + "." + postId + "." +txtDescription);
                    }
                }
            });
        }
    },
    boxDelete : function(txtContent){
        $('[data-toggle="popover"]').popover('hide');
        var postId = common.getPostId();
        var word_id = localStorage.getItem(txtContent).split('.')[0];
        $.ajax({
            type:'POST',
            url:'/videos/delete',
            data:{ word_content:txtContent, post_id:postId , id: word_id},
            success:function(data){
                localStorage.removeItem(txtContent);
            }
        });
    },
    bindText : function(){
        // span name : text
        $('span[name="text"]').each(function(idx, obj){
            var text = $(this).html();
            var archive = [];
            var archive = storage.allStorage();
            archive.forEach(function(keytext){
                if(keytext !== null)
                {
                    text = text.toString().replace(new RegExp(keytext, 'g'), "<span name='mark' class='text-primary text-underline' data-toggle=\"tooltip\" data-placement=\"top\" title=\""+ localStorage.getItem(keytext).split('.')[2] +"\" onclick='popover.boxShow(\""+keytext+ "\")' >"+keytext+"</span>");
                }
                text = text.toString().replace(decodeURIComponent(vars['key']), '<span class="text-primary text-underline"><b>'+decodeURIComponent(vars['key'])+'</b></span>');
            })
            $(this).text("");
            $(this).append(text);
        });
        words.bindListWords();
    },
    markText : function(keytext){
        var str_text = $('span[name="text"]').html();
        str_text = str_text.toString().replace(new RegExp(keytext, 'g'), "<span name='mark' class='text-primary text-underline' data-toggle=\"tooltip\" data-placement=\"top\" title=\""+ localStorage.getItem(keytext).split('.')[2] +"\" onclick='popover.boxShow(\""+keytext+ "\")' >"+keytext+"</span>");
        $('span[name="text"]').html(str_text);
            words.listWordsInit(keytext, localStorage.getItem(keytext).split('.')[2]);
        },
    setToolTip : function(){
        setTimeout(function(){
            $('[data-toggle="tooltip"]').tooltip();
        }, 1000);
    }
}
const kanji ={
    getKanji: function (text) {
    var regex = /([\u3400-\u4dbf]|[\u4e00-\u9faf])+/g;
    //var text = "ノート円に円雨をかく。";
    if(regex.test(text)) {
        return text.match(regex);
    }
    else {
        return false;
    }
  },
}
const LIST_WORD = 'WORD';
const storage = {

    allStorage : function() {
        var archive = [];
        for (var i = 0; i<localStorage.length; i++) {
            archive[i] = localStorage.key(i);
        }
        return archive;
    },
    loadListWords :function(){
        $.ajax({
            type:'GET',
            url: "/api/user/words",
            success: function(data){
                if(data.success != 'false'){
                    localStorage.clear();
                    data.success.forEach(myFunction);
                    function myFunction(item, index) {
                        localStorage.setItem(item.word_content, item.id + "." + item.post_id + "." +item.word_description);
                    }
                }
                // mark text
                popover.bindText();
            },
            error: function (error) {
                console.log(error);
            }
        });
    },
    bindText : function(){
        // check kanji
        $('span[name="sentence"]').each(function(idx, obj){
            var text = $(this).text();
            var strKanji = kanji.getKanji($(this).text());
            if(strKanji !== false)
            {
                strKanji.forEach(myFunction);
                function myFunction(item) {
                    text = text.toString().replace(item, '<a class="text-danger"><b>'+item+'</b></a>');
                }
            }
            text = text.toString().replace(decodeURIComponent(vars['key']), '<span class="text-primary"><b>'+decodeURIComponent(vars['key'])+'</b></span>');
            $(this).text("");
            $(this).append(text);
        });

    }
}
const words ={
    search : function(){
        var txtkey = $("#boxSearch").val();
        var archive = storage.allStorage();
        $("#listWords").html("");
        archive.find(function(element) {
            if(element.search(txtkey) != -1){
                words.listWordsInit(element, localStorage.getItem(element).split('.')[2], localStorage.getItem(element).split('.')[1]);
            };
        });
        if(txtkey.length == 0){
            words.bindListWords();
        }
    },
    bindListWords : function(){
        for (var i = 0; i < localStorage.length; i++){
            words.listWordsInit(localStorage.key(i), localStorage.getItem(localStorage.key(i)).split('.')[2], localStorage.getItem(localStorage.key(i)).split('.')[1]);
        }
    },
    listWordsInit: function(content, description, post_id){
        $("#listWords").append("<li><a href='/videos/"+ post_id +"' data-toggle=\"tooltip\" data-placement=\"top\" title=\""+ description +"\">"+ content + "</a></li>");
    },
    checkPost : function(chk){
        $("#listWords").html("");
        var postId = common.getPostId();
        if(chk.checked){
            for (var i = 0; i < localStorage.length; i++){
                if(postId === localStorage.getItem(localStorage.key(i)).split('.')[1])
                {
                    words.listWordsInit(localStorage.key(i), localStorage.getItem(localStorage.key(i)).split('.')[2], localStorage.getItem(localStorage.key(i)).split('.')[1]);
                }
            }
        }
        else{
            words.bindListWords();
        }
        popover.setToolTip();
    },
    markText : function(chk){
        if(!chk.checked){
            $('span[name = "mark"]').addClass('text-clear');
            $('span[name = "mark"]').tooltip('disable');
        }
        else{
            $('span[name = "mark"]').removeClass('text-clear');
            $('span[name = "mark"]').tooltip('enable')
        }
    }
}
