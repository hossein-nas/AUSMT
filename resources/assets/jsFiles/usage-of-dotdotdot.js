/**
 * Created by echa on 2/7/17.
 */
/*
 * dotdotdot for incoming events
 * */
window.onload=function ( )
{
	dotdotdot_update();
}
function dotdotdot_update(  )
{
	$( '.incoming-events .wrapper' ).dotdotdot({
		watch: "true",
		after: ".read-more",
		callback: function (isTruncated, orgContent) {
			if (isTruncated) {
				$('.read-more', this).show();
			}
		}
	});
	$( '.incoming-events .wrapper' ).trigger( "update" );
}

