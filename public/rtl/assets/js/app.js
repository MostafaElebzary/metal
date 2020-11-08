/*
 Template Name: Admiria - Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Main js
 */

!function ($) {
    "use strict";

    $('#cat_id').change(function() {	
        $('#subcat_id').empty();
        var currenturl = window.location.hostname;
        var oldThis=$(this);
        var $select = $('#cat_id');
        var cat_id = $('option:selected', $select).attr('cat_id');
        var p = {
            cat_id:cat_id
        
        };
    
        $.post("http://localhost/learn/admins/category/get_subcat/", p, function(data){
        
        $('#subcat_id').append(data);
        });
    });

    $('#type').change(function(){
        var $select = $('#type');
        var type = $('option:selected', $select).attr('type');

        if (type == 1 ) {
            document.getElementById('choices').style.display = 'block';
            document.getElementById('yes_or_no').style.display = 'none';
            document.getElementById('text').style.display = 'none';
        } else if (type == 2) {
            document.getElementById('choices').style.display = 'none';
            document.getElementById('yes_or_no').style.display = 'block';
            document.getElementById('text').style.display = 'none';
        } else if (type == 3) {
            document.getElementById('choices').style.display = 'none';
            document.getElementById('yes_or_no').style.display = 'none';
            document.getElementById('text').style.display = 'block';
        } else {
            document.getElementById('choices').style.display = 'none';
            document.getElementById('yes_or_no').style.display = 'none';
            document.getElementById('text').style.display = 'none';
        }
    });

    

    $('#cat_e_id').change(function() {	
        $('#subcat_e_id').empty();
        var currenturl = window.location.hostname;
        var oldThis=$(this);
        var $select = $('#cat_e_id');
        var cat_e_id = $('option:selected', $select).attr('cat_e_id');
        var p = {
            cat_id:cat_e_id
        
        };
    
        $.post("http://localhost/learn/admins/category/get_subcat/", p, function(data){
        
        $('#subcat_e_id').append(data);
        });
    });

    $('#cat_e_id').change(function() {	

        var $select = $('#cat_e_id');
        var cat_e_id = $('option:selected', $select).attr('cat_e_id');

        var $select = $('#subcat_e_id');
        var subcat_e_id = $('option:selected', $select).attr('subcat_e_id');

        var dataTable = $('#questions_data').DataTable({  
            "processing":true,  
            "serverSide":true, 
            "searching": true, 
            "filtering": false, 
            "ordering": false,
            "info":     false,
            "order":[],  
            "ajax":{  
                url:"http://localhost/learn/admins/questions/get_que/"+cat_e_id+"/"+subcat_e_id,  
                type:"POST"  
            },
            "bDestroy": true
    
        });

    });

    $('#subcat_e_id').change(function() {	

        var $select = $('#cat_e_id');
        var cat_e_id = $('option:selected', $select).attr('cat_e_id');

        var $select = $('#subcat_e_id');
        var subcat_e_id = $('option:selected', $select).attr('subcat_e_id');

        
        var dataTable = $('#questions_data').DataTable({  
            "processing":true,  
            "serverSide":true,
            "searching": true, 
            "filtering": false,  
            "ordering": false,
            "info":     false,
            "order":[],  
            "ajax":{  
                url:"http://localhost/learn/admins/questions/get_que/"+cat_e_id+"/"+subcat_e_id,  
                type:"POST"  
            },
            "bDestroy": true
    
        });

        //dataTable.ajax.reload();

    });

    var baseurl = "<?= baseurl() ?>";
	$('#level_ab_id').change(function() {	
	$('#student_ab_id').empty();
	var currenturl = window.location.hostname;
	var oldThis=$(this);
	var $select = $('#level_ab_id');
	var level_ab_id = $('option:selected', $select).attr('level_ab_id');
	var p = {
        level_ab_id:level_ab_id
	
	};

	$.post("http://localhost/learn/admins/absence/get_students/", p, function(data){
	
	$('#student_ab_id').append(data);
	});
    });

    $('#classroom').change(function() {	
        $('#student_id').empty();
        var $select = $('#classroom');
        var classroom = $('option:selected', $select).attr('classroom');
        var p = {
            classroom:classroom
        };
    
        $.post("http://localhost/learn/admins/report/get_students/", p, function(data){
        
        $('#student_id').append(data);
        });
    });

    $("#form-exam").steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slide",
        onFinished: function (event, currentIndex) {
            // var form = $(this);
            // form.submit();
            $.ajax({  
                url:"http://localhost/learn/admins/exams/add_exam_student",  
                method:'POST',  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                {  
                    window.location.href = "http://localhost/learn/admins/exams/all_result_student";
                }  
            }); 
        },
    });

    $(document).on('submit', '#form-exam', function(event){  
        event.preventDefault();  
        $.ajax({  
            url:"http://localhost/learn/admins/exams/add_exam_student",  
            method:'POST',  
            data:new FormData(this),  
            contentType:false,  
            processData:false,  
            success:function(data)  
            {  
                window.location.href = "http://localhost/learn/admins/exams/all_result_student";
            }  
        });  
    });

    $('#student_id').change(function() {	
        var $select = $('#student_id');
        var student_id = $('option:selected', $select).attr('student_id');

        var dataTable = $('#datatable').DataTable({  
            "processing":true,  
            "serverSide":true, 
            "searching": true, 
            "filtering": false, 
            "ordering": false,
            "info":     false,
            "order":[],  
            "ajax":{  
                url:"http://localhost/learn/admins/exams/view_exam_results/"+student_id,  
                type:"POST"  
            },
            "bDestroy": true
    
        });

    });

    $("#page_title").keyup(function(){
		var Text = decodeURIComponent($(this).val());
		Text = Text.toLowerCase();
		Text = Text.replace(/\s/g,'_');
		Text = Text.replace(/[^\u0100-\uFFFF\w\-]/g,'_');
		Text = Text.replace(/^-+/, '');
		Text = Text.replace(/-+$/, '');
		$("#page_slug").val(Text);    
    });
    
    $("#page_title2").keyup(function(){
		var Text = decodeURIComponent($(this).val());
		Text = Text.toLowerCase();
		Text = Text.replace(/\s/g,'_');
		Text = Text.replace(/[^\u0100-\uFFFF\w\-]/g,'_');
		Text = Text.replace(/^-+/, '');
		Text = Text.replace(/-+$/, '');
		$("#page_slug2").val(Text);    
	});

    var MainApp = function () {
        this.$body = $("body"),
            this.$wrapper = $("#wrapper"),
            this.$btnFullScreen = $("#btn-fullscreen"),
            this.$leftMenuButton = $('.button-menu-mobile'),
            this.$menuItem = $('.has_sub > a')
    };
    //scroll
    MainApp.prototype.initSlimscroll = function () {
        $('.slimscrollleft').slimscroll({
            height: 'auto',
            position: 'right',
            size: "10px",
            color: '#9ea5ab'
        });
    },
        //left menu
        MainApp.prototype.initLeftMenuCollapse = function () {
            var $this = this;
            this.$leftMenuButton.on('click', function (event) {
                event.preventDefault();
                $this.$body.toggleClass("fixed-left-void");
                $this.$wrapper.toggleClass("enlarged");
            });
        },
        //left menu
        MainApp.prototype.initComponents = function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
        },
        //full screen
        MainApp.prototype.initFullScreen = function () {
            var $this = this;
            $this.$btnFullScreen.on("click", function (e) {
                e.preventDefault();

                if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullscreen) {
                        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            });
        },
        //full screen
        MainApp.prototype.initMenu = function () {
            var $this = this;
            $this.$menuItem.on('click', function () {
                var parent = $(this).parent();
                var sub = parent.find('> ul');

                if (!$this.$body.hasClass('sidebar-collapsed')) {
                    if (sub.is(':visible')) {
                        sub.slideUp(300, function () {
                            parent.removeClass('nav-active');
                            $('.body-content').css({height: ''});
                            adjustMainContentHeight();
                        });
                    } else {
                        visibleSubMenuClose();
                        parent.addClass('nav-active');
                        sub.slideDown(300, function () {
                            adjustMainContentHeight();
                        });
                    }
                }
                return false;
            });

            //inner functions
            function visibleSubMenuClose() {
                $('.has_sub').each(function () {
                    var t = $(this);
                    if (t.hasClass('nav-active')) {
                        t.find('> ul').slideUp(300, function () {
                            t.removeClass('nav-active');
                        });
                    }
                });
            }

            function adjustMainContentHeight() {
                // Adjust main content height
                var docHeight = $(document).height();
                if (docHeight > $('.body-content').height())
                    $('.body-content').height(docHeight);
            }
        },
        MainApp.prototype.activateMenuItem = function () {
            // === following js will activate the menu in left side bar based on url ====
            $("#sidebar-menu a").each(function () {
                var pageUrl = window.location.href.split(/[?#]/)[0];
                if (this.href == pageUrl) {
                    $(this).addClass("active");
                    $(this).parent().addClass("active"); // add active to li of the current link
                    $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                    $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
                    $(this).parent().parent().prev().click(); // click the item to make it drop
                }
            });
        },
        MainApp.prototype.Preloader = function () {
            $(window).on('load', function() {
                $('#status').fadeOut();
                $('#preloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({
                    'overflow': 'visible'
                });
            });
        },
        MainApp.prototype.ToggleSearch = function () {
            $('.toggle-search').on('click', function () {
                var targetId = $(this).data('target');
                var $searchBar;
                if (targetId) {
                    $searchBar = $(targetId);
                    $searchBar.toggleClass('open');
                }
            });
        },
        MainApp.prototype.init = function () {
            this.initSlimscroll();
            this.initLeftMenuCollapse();
            this.initComponents();
            this.initFullScreen();
            this.initMenu();
            this.activateMenuItem();
            this.Preloader();
            this.ToggleSearch();
        },
        //init
        $.MainApp = new MainApp, $.MainApp.Constructor = MainApp
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.MainApp.init();
    }(window.jQuery);