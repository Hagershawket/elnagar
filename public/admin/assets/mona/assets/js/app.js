// Sidebar

! function($) {
    "use strict";
    var Sidemenu = function() {
        this.$menuItem = $("#sidebar-menu a");
    };

    Sidemenu.prototype.init = function() {
        var $this = this;
        $this.$menuItem.on('click', function(e) {
        if ($(this).parent().hasClass("submenu")) {
            e.preventDefault();
        }
        if (!$(this).hasClass("subdrop")) {
            $("ul", $(this).parents("ul:first")).slideUp(350);
            $("a", $(this).parents("ul:first")).removeClass("subdrop");
            $(this).next("ul").slideDown(350);
            $(this).addClass("subdrop");
        } else if ($(this).hasClass("subdrop")) {
            $(this).removeClass("subdrop");
            $(this).next("ul").slideUp(350);
        }
    });
        $("#sidebar-menu ul li.submenu a.active").parents("li:last").children("a:first").addClass("active").trigger("click");
    },
    $.Sidemenu = new Sidemenu;

}(window.jQuery),

$(document).ready(function($) {
    
    // Sidebar Initiate
    
    $.Sidemenu.init();

    // Sidebar overlay
    
    var $sidebarOverlay = $(".sidebar-overlay");
    $("#mobile_btn, .task-chat").on("click", function(e) {
        var $target = $($(this).attr("href"));
        if ($target.length) {
            $target.toggleClass("opened");
            $sidebarOverlay.toggleClass("opened");
            $("html").toggleClass("menu-opened");
            $sidebarOverlay.attr("data-reff", $(this).attr("href"));
        }
        e.preventDefault();
    });

    $sidebarOverlay.on("click", function(e) {
        var $target = $($(this).attr("data-reff"));
        if ($target.length) {
            $target.removeClass("opened");
            $("html").removeClass("menu-opened");
            $(this).removeClass("opened");
            $(".main-wrapper").removeClass("slide-nav");
        }
        e.preventDefault();
    });
    



    if ($('.floating').length > 0) {
        $('.floating').on('focus blur', function(e) {
            $(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
        }).trigger('blur');
    }


    if ($('.msg-list-scroll').length > 0) {
        $('.msg-list-scroll').slimscroll({
            height: '100%',
            color: '#878787',
            disableFadeOut: true,
            borderRadius: 0,
            size: '4px',
            alwaysVisible: false,
            touchScrollStep: 100
        });
        var h = $(window).height() - 124;
        $('.msg-list-scroll').height(h);
        $('.msg-sidebar .slimScrollDiv').height(h);

        $(window).resize(function() {
            var h = $(window).height() - 124;
            $('.msg-list-scroll').height(h);
            $('.msg-sidebar .slimScrollDiv').height(h);
        });
    }



    if ($('.slimscroll').length > 0) {
        $('.slimscroll').slimScroll({
            height: 'auto',
            width: '100%',
            position: 'right',
            size: "7px",
            color: '#ccc',
            wheelStep: 10,
            touchScrollStep: 100
        });
        var hei = $(window).height() - 60;
        $('.slimscroll').height(hei);
        $('.sidebar .slimScrollDiv').height(hei);

        $(window).resize(function() {
            var hei = $(window).height() - 60;
            $('.slimscroll').height(hei);
            $('.sidebar .slimScrollDiv').height(hei);
        });
    }

   

    if ($('.page-wrapper').length > 0) {
        var height = $(window).height();
        $(".page-wrapper").css("min-height", height);
    }

    $(window).resize(function() {
        if ($('.page-wrapper').length > 0) {
            var height = $(window).height();
            $(".page-wrapper").css("min-height", height);
        }
    });





    if ($('.main-wrapper').length > 0) {
        var $wrapper = $(".main-wrapper");
        $('#mobile_btn').click(function() {
            $wrapper.toggleClass('slide-nav');
            $('#chat_sidebar').removeClass('opened');
            $(".dropdown.open > .dropdown-toggle").dropdown("toggle");
            return false;
        });
        $('#open_msg_box').click(function() {
            $wrapper.toggleClass('open-msg-box');
            $('.themes').removeClass('active');
            $('.dropdown').removeClass('open');
            return false;
        });
    }



    if ($('.proimage-thumb li a').length > 0) {
        var full_image = $(this).attr("href");
        $(".proimage-thumb li a").click(function() {
            full_image = $(this).attr("href");
            $(".pro-image img").attr("src", full_image);
            return false;
        });
    }

    

    if ($('#pro_popup').length > 0) {
        $('#pro_popup').lightGallery({
            thumbnail: true,
            selector: 'a'
        });
    }
    
    if ($('#lightgallery').length > 0) {
        $('#lightgallery').lightGallery({
            thumbnail: true,
            selector: 'a'
        });
    }



    $('.table-responsive').on('shown.bs.dropdown', function(e) {
        var $table = $(this),
            $dropmenu = $(e.target).find('.dropdown-menu'),
            tableOffsetHeight = $table.offset().top + $table.height(),
            menuOffsetHeight = $dropmenu.offset().top + $dropmenu.outerHeight(true);

        if (menuOffsetHeight > tableOffsetHeight)
            $table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
    });
    $('.table-responsive').on('hide.bs.dropdown', function() {
        $(this).css("padding-bottom", 0);
    });



  
    var addTask = function() {
        var newTask = $('#new-task').val();
    };
    var closeNewTaskPanel = function() {
        $('.add-task-btn').toggleClass('visible');
        $('.new-task-wrapper').toggleClass('visible');
      
    };

    $('.add-task-btn').click(function() {
        $(this).toggleClass('visible');
        $('.new-task-wrapper').toggleClass('visible');
    
    });

    $('#add-task').click(addTask);
    $('#close-task-panel').click(closeNewTaskPanel);

  



    if ($("#drop-zone").length > 0) {
        var dropZone = document.getElementById('drop-zone');
        var uploadForm = document.getElementById('js-upload-form');
        var startUpload = function(files) {
            console.log(files)
        }

        uploadForm.addEventListener('submit', function(e) {
            var uploadFiles = document.getElementById('js-upload-files').files;
            e.preventDefault()

            startUpload(uploadFiles)
        })

        dropZone.ondrop = function(e) {
            e.preventDefault();
            this.className = 'upload-drop-zone';

            startUpload(e.dataTransfer.files)
        }

        dropZone.ondragover = function() {
            this.className = 'upload-drop-zone drop';
            return false;
        }

        dropZone.ondragleave = function() {
            this.className = 'upload-drop-zone';
            return false;
        }

    }

     $('.MooobMenu ul>li').click(function(){
      $('.MooobMenu ul>li>ul.sm-nowrap').toggleClass('active');
      $(this).siblings().find('ul').slideUp(200)
      $(this).find('ul').slideToggle(200)
    })
    $('.OpenMenu').click(function(){
      $('.BadMenu,.OpenMenu').toggleClass('active');
    });

    if($(window).width() < 1024){
      $('.MooobMenu ul>li ul.sm-nowrap').parent().find('>a').click(function(e){
        e.preventDefault();
      });
    }

    $(window).resize(function(){
      if($(this).width() < 1024){
        $('.MooobMenu ul>li ul.sm-nowrap').parent().find('>li').click(function(e){
          e.preventDefault();
        });
      }      
    });


      

});