function initDash() {
    RUZEE.Borders.add
	({
        /*".main-area": { borderType: "simple", cornerRadius: 5 },*/
        ".quick-stats-round": { borderType: "simple", cornerRadius: 5 },
        ".account-block": { borderType: "simple", cornerRadius: 5, edges: 'lrb' }
	});
    RUZEE.Borders.render();
}

function initPage() {
    RUZEE.Borders.add
	({
	    /*".main-area-container": { borderType: "simple", cornerRadius: 5, edges: 'lrb' },*/
	    ".account-block": { borderType: "simple", cornerRadius: 5, edges: 'lrb' }
	});
    RUZEE.Borders.render();
}

function initCorners() {
    RUZEE.Borders.add
	({
	    ".corner1": { borderType: "simple", cornerRadius: 5 }
	});
    RUZEE.Borders.render();
}

function confirm(message, callback) {
    $('#confirm').modal({
        close: false,
        position: ["20%", ],
        overlayId: 'confirmModalOverlay',
        containerId: 'confirmModalContainer',
        opacity: 50,
        onShow: function(dialog) {
            dialog.data.find('.message').append(message);

            // if the user clicks "yes"
            //dialog.data.find('.yes').click(function () {
            //				// call the callback
            //				if ($.isFunction(callback)) {
            //					callback.apply();
            //				}
            //				// close the dialog
            //				$.modal.close();
            //			});
        }
    });
}

function ChangeSelector(selObj) {
    var selIndex = selObj.selectedIndex;
    var val = selObj.options[selIndex].value;
    if (val == '1') {
        $('#spanSelector input').hide();
        $('#spanSelector select').show();
    }
    else {
        $('#spanSelector input').show();
        $('#spanSelector select').hide();
    }

}


var myIndexes = new Array();
var myDivs = new Array();

function runIntro(id, interval, isAppear) {
    var intro = $('#' + id);
    if (intro != null) {
        var divs = $('#' + id + ' .intro-frame'); //  intro.getElementsByClassName("intro-frame");
        myDivs[id] = divs;
        myIndexes[id] = 0;
    }

    setInterval('showIntroFrame("' + id + '",' + isAppear + ');', interval);
}

function showIntroFrame(id, isAppear) {
    divs = myDivs[id];
    cur_index = myIndexes[id];
    if(isAppear)
        $(divs[cur_index]).fadeOut('slow');
    else 
        $(divs[cur_index]).slideUp('slow');
    cur_index = cur_index < divs.length - 1 ? cur_index + 1 : 0;
    myIndexes[id] = cur_index;
    if (isAppear)
        $(divs[cur_index]).fadeIn('slow');
    else
        $(divs[cur_index]).slideDown('slow');
}


function DisableScreen() {
    var overlay = jQuery('<div id="screen_overlay"> </div>');
    overlay.appendTo(document.body);
}

function EnableScreen() {
    setTimeout("$('div').remove('#screen_overlay');", 1000);
}

function showUploader(lnk) {
    $(lnk).hide(); $('#uploadPic').show(); 
}


function SignupCheckRequiredInputs() {
    var isError = false;
    $("div.gallerysite_screen_overlay_form input").each(function(i) {
        var attr = $(this).attr("data-required-for");
        if (typeof attr !== 'undefined' && $.trim($(this).val()).length < 1) {
            $("#" + attr).show();
            if (!isError) $(window).scrollTop($("#" + attr).position());
            isError = true;
        } else {
            $("#" + attr).hide();
        }
    });
    return isError;
}

function SubmitCloneForm() {
    if (!SignupCheckRequiredInputs()) {
        $("#gallerysite_screen_overlay_form").submit();
        $("#id_gallerysite_screen_overlay_form").slideUp(1000);
        setTimeout('$("#id_gallerysite_screen_overlay_form_submitted").show();', 2000);
        
    }
}

function SetCouponCode() {
    var timer;
    $('img.spinner').hide();
    $('img.checkmark').hide();

    $('input.coupon').keydown(function() {
        window.clearTimeout(timer);
    });

    $('input.coupon').keyup(function() {
        $('img.spinner').show();
        $('img.checkmark').hide();
        timer = window.setTimeout(function() {
            $.ajax({
                url: "@clone_site=yes&clone_site_coupon=" + $('#clone_site_coupon').val(),
                context: document.body,
                success: function(data, textStatus, jqXHR) {
                    $('img.spinner').hide();
                    $('img.checkmark').hide();
 
                    if (data == 'none') {
                        $('#_couponError').hide(); $('#_couponOk').hide();
                    } else if (data == 'error') {
                        $('#_couponError').show();
                        $('#_couponOk').hide();
                    } else {
                        $('#_couponError').hide();
                        $('#_couponOkDiscount').html(data);
                        $('#_couponOk').show();
                        $('img.checkmark').show();
                    }
                }
            });
        }, 2000);
    });
}