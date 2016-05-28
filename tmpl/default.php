<?php
// No direct access
defined('_JEXEC') or die; ?>

<!-- Show readmore -->
<p class="read-more">
	<button class="read-more-btn">Читать полностью</button>
</p>
<!-- /Show readmore -->

<style type="text/css">
	.<?=$cssclass;?> {
		max-height: 700px;
		position: relative;
		overflow: hidden;
		width: 462px;
	}

	.<?=$cssclass;?> .read-more {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		text-align: center;
		margin: 0;
		padding: 120px 0 0;

		background-image: linear-gradient(to bottom, transparent, white);
	}

	.read-more-btn {
		font-weight: bold;
		background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top, #f46b3c 0%, #fa7749 50%, #f96330 50%, #f54305 100%) repeat scroll 0 0;
		border: 1px solid #db2c15;
		border-radius: 5px;
		box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 1px 1px 0 0 rgba(255, 255, 255, 0.4) inset;
		box-sizing: border-box;
		color: #fff !important;
		cursor: pointer;
		display: inline-block;
		font-family: "PT Sans", Helvetica, Arial, sans-serif;
		height: 35px;
		line-height: normal;
		margin: 0 144px;
		padding: 7px 15px;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);
		transition: opacity 0.2s linear 0s;
		width: 173px;
	}

	.read-more-btn:hover {
		opacity: 0.85;
	}
</style>

<script type="text/javascript">
	(function ($) {
		var $el, $ps, totalHeight;

		$(".read-more .read-more-btn").click(function (e) {
			e.preventDefault();

			totalHeight = 0;

			$el = $(this);
			var $p = $(".<?=$cssclass;?>");
			$ps = $p.find("p:not('.read-more')");

			$ps.each(function () {
				totalHeight += $(this).outerHeight();
			});

			$p.css({
				"height": "auto",
				"max-height": 99999
			});

			$(this).hide();
			$(this).parent().hide();
		});
	})(jQuery);
</script>
