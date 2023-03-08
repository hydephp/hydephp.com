<style>
	#delta {
		width: 600px;
		height: 350px;
		overflow: hidden;
		position: relative;
	}
	
	#delta figure {
		width: 600px;
		height: 350px;
		padding: 20px;
		position: absolute;
		background-size: contain;
		background-repeat: no-repeat;
	}
	
	#delta #start {
		background-image: url('./media/argon-d00ed0ae01ca464d63a18c80d1d403521877c210728df0d94d57511d5f76adfe.png');
	}
	#delta #end {
		background-image: url('./media/example_post_hello_world_mbp.png');
	}
	#delta #mask {
		width: 600px;
		height: 350px;
		z-index: 10;
		position: relative;
		overflow: hidden;
		top: 0;
	}
	#delta-container {
		position: relative;
		width: fit-content;
		margin: 0 auto;
	}
	#delta-container #slider {
		width: 350px;
		transform: rotate(90deg);
		position: absolute;
		z-index: 30;
		top: 175px;
		left: 400px;
	}
	#slider {
		transition: opacity 0.5s ease-in-out;
	}
	@media screen and (max-width: 600px) {
		#delta-container {
			width: 100%;
		}

		#delta {
			min-width: 280px;
			width: 100%;
			max-width: 100vw;
		}
		
		#delta figure {
			min-width: 280px;
			width: 100%;
			max-width: 100vw;
		}
		
		#delta #mask {
			min-width: 280px;
			width: 100%;
			max-width: 100vw;
		}
	}
</style>

<div id="delta-container">
	<div id="delta" >
	
		<figure id="start"></figure>
		
		<div id="mask" style="max-height: 0%;">
			<figure id="end"></figure>
		</div>
	</div>
	<input type="range" min="0" max="100" value="0" class="slider" id="slider" style="opacity: 0;">
</div>
<script>
	// Check if user has prefers reduced motion enabled
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion)').matches) {
		console.log('Prefers reduced motion detected. Animations disabled.');
	} else {
		var slider = document.getElementById("slider");
		
		var end = document.getElementById("end");
		var mask = document.getElementById("mask");

		slider.oninput = function() {
			end.style.top = this.value;
				
			var endPos = parseInt(this.value) + 1.5;
		
			mask.style.maxHeight = endPos + "%";
		}
			
		let lastKnownScrollPosition = 0;
		let ticking = false;

		function reactToScroll(scrollPos) {
			value = (scrollPos - 20) * ((Math.exp(0.3) - 1) * (scrollPos * 0.01));
			slider.value = value;
			slider.dispatchEvent(new Event('input'));
		}

		document.addEventListener('scroll', function(e) {
		lastKnownScrollPosition = window.scrollY;

		if (!ticking) {
			window.requestAnimationFrame(function() {
			reactToScroll(lastKnownScrollPosition);
			ticking = false;
			});

			ticking = true;
		}
		});

		// Show the slider on load
		window.addEventListener('load', function(e) {
			slider.style.opacity = 1;
		});


	}
</script>