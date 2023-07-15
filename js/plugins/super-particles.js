/**
 * File super-particles.js.
 *
 * Initiate and config SuperParticles.js
 * Used on inside pages (not the homepage, for performance reasons)
 * src: https://github.com/T-vK/SuperParticles
 */

window.onload = function(){
	new SuperParticles({
		maxFps: 24,
		container: {
			backgroundCssRule: 'transparent',
			element: '#particles'
		},
		particles: {
			velocity: 4,
			color: '0xBDAE99',
			fadeInDuration: 5
		},
		lines: {
			velocity: 4,
			maxOpacity: '0.3'
		}
	})
}