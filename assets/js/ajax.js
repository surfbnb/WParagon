/* sending ajax request count vote against post*/
function tmg_vote_btn_ajax (postId,usrid) 
{
	var post_id = postId;
    var usr_ID = usrid;
	jQuery.ajax({
		url : tmg_ajax_url.ajax_url,
		type : 'post',
		data : {
			action : 'tmg_vote_btn_ajax_action',
			pid : post_id,
			uid : usr_ID
		},
		success : function( response ) {
            jQuery("#tmgAjaxResponse span").html(response);
		}
	});
}