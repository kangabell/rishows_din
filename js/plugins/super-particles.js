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
			velocity: 5,
			color: '0xd7c69e',
			fadeInDuration: 5
		},
		lines: {
			velocity: 5,
			maxOpacity: '0.3'
		}
	})
}