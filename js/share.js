// var pageLink = window.location.href;
// var pageTitle = String(document.title).replace(/\&/g, '%26');

var pageLink = '';
var pageTitle = '';
var details = [];


var mainButton = document.getElementsByClassName('main-share-btn'); // Assumes element with id='button'
var shareList = document.getElementsByClassName('share-list'); // Assumes element with id='button'
// var clicker = document.getElementsByClassName('main-share-btn');
// console.log(mainButton)

for (var i = 0; i < mainButton.length; i++) {
    var div = mainButton[i];
    var div2 = shareList[i];
    var dynamicId = (i + 1);
    var dynamicId2 = "share_list_" + (i + 1);
    div.setAttribute("id", dynamicId);
    // div.id = i + 1;
    div2.setAttribute("id", dynamicId2);
    // div2.id = i + 1;
}


for (var i = 0; i < mainButton.length; i++) {
    mainButton[i].onclick = function() {
        jQuery('.share-list').css('display', 'none');
        // console.log(this.getAttribute('id'))
        var id = this.getAttribute('id');
        var dynamicId = "#share_list_" + (id);
        jQuery("#share_list_" + id).css('display', 'inline-flex');
        var div = document.querySelector(dynamicId);
        // console.log(div)
        // if (div.style.display === 'none') {
        //     div.style.display = 'inline-flex';
        // } else {
        //     div.style.display = 'none';
        // }
        console.log(dynamicId)
        jQuery(dynamicId).toggleClass("flexbox");
        var otherInput = jQuery(this).closest('.main-share-btn').parent().prev();
        var fileLink = jQuery(otherInput).attr('href');
        details = get_share_links(fileLink);
        // console.log(otherInput)
    };
    console.log(details);
}

function get_share_links(links) {
    var pageLink = links;
    var pageTitle = 'KU';
    return [pageLink, pageTitle];
}

pageLink = details[0];
pageTitle = details[1];


function fbs_click() {
    console.log(pageLink);
    window.open(`http://www.facebook.com/sharer.php?u=${details[0]}&quote=${details[1]}`, 'sharer', 'toolbar=0,status=0,width=626,height=436');
    return false;
}

function tbs_click() { window.open(`https://twitter.com/intent/tweet?text=${details[1]}&url=${details[0]}`, 'sharer', 'toolbar=0,status=0,width=626,height=436'); return false; }

function lbs_click() { window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${details[0]}`, 'sharer', 'toolbar=0,status=0,width=626,height=436'); return false; }

function rbs_click() { window.open(`https://www.reddit.com/submit?url=${details[0]}`, 'sharer', 'toolbar=0,status=0,width=626,height=436'); return false; }

function pbs_click() { window.open(`https://www.pinterest.com/pin/create/button/?&text=${details[1]}&url=${details[0]}&description=${details[1]}`, 'sharer', 'toolbar=0,status=0,width=626,height=436'); return false; }

function whp_click() { window.open(`https://web.whatsapp.com/send?text=${details[0]}`, 'sharer', 'toolbar=0,status=0,width=626,height=436'); return false; }