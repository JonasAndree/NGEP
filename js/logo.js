const WIDTH = 160;
const HEIGHT = 120;

// Set some camera attributes.
const VIEW_ANGLE = 20;
const ASPECT = WIDTH / HEIGHT;
const NEAR = 0.1;
const FAR = 10000;

// Get the DOM element to attach to
const container = document.querySelector('#page-logo');

// Create a WebGL renderer, camera
// and a scene
const renderer = new THREE.WebGLRenderer();
const camera =
    new THREE.OrthographicCamera(
    		WIDTH / - 2, 
    		WIDTH / 2, 
    		HEIGHT / 2, 
    		HEIGHT / - 2, 
    		1, 
    		1000 
    );

const scene = new THREE.Scene();

// Add the camera to the scene.
scene.add(camera);

// Start the renderer.
renderer.setSize(WIDTH, HEIGHT);

// Attach the renderer-supplied
// DOM element.
container.appendChild(renderer.domElement);

// create a point light
const pointLight =
  new THREE.PointLight(0xff8040, 0.6);

// set its position
pointLight.position.x = 10;
pointLight.position.y = 10;
pointLight.position.z = 100;

// add to the scene
scene.add(pointLight);

// create the sphere's material
const activeMaterial =
  new THREE.MeshLambertMaterial(
    {
      color: 0xff8040,
      emissive: 0xff8040,
      shininess: 100,
      specular: 0xffffff
    });
const inactiveMaterial =
	  new THREE.MeshLambertMaterial(
	    {
	      color: 0x282828,
	      emissive: 0x383838,
	      shininess: 100,
	      specular: 0xffffff
	    });
var toruses = []; 
toruses.push(createTorus(activeMaterial, 1, 0));
for (var i = 0; i < 100; i++) {
	var newX = (Math.random() * WIDTH) - WIDTH/2;
	var newY = (Math.random() * HEIGHT) - HEIGHT/2;
	
	toruses.push(createTorus(inactiveMaterial, 
			newX, newY));
}


for (var i = 0; i < toruses.length; i++) {
	scene.add(toruses[i]);
}
console.log(toruses.length);

function createTorus(material, x, y) {
	// Set up the sphere vars
	const RADIUS = 2;
	const TUBE = 1;
	const RADIAL_SEGMENTS = 8;
	const TUBALAR_SEGMENTS = 8;

	/*
	 * TorusGeometry(radius : Float, tube : Float, radialSegments : Integer, tubularSegments : Integer, arc : Float)
	 * radius - Radius of the torus, from the center of the torus to the center of the tube. Default is 1. 
	 * tube — Radius of the tube. Default is 0.4. 
	 * radialSegments — Default is 8 
	 * tubularSegments — Default is 6. 
	 * arc — Central angle. Default is Math.PI * 2.
	 */
	const torus = new THREE.Mesh(
			new THREE.TorusGeometry(RADIUS, TUBE, RADIAL_SEGMENTS, TUBALAR_SEGMENTS),
			material);

	// Move the Sphere back in Z so we
	// can see it.
	torus.position.x = x;
	torus.position.y = y;
	torus.position.z = -10;

	// Finally, add the sphere to the scene.
	return torus;
}

function update () {
  // Draw!
  renderer.render(scene, camera);

  // Schedule the next frame.
  requestAnimationFrame(update);
}

// Schedule the first frame.
requestAnimationFrame(update);




var THREEx	= THREEx || {}

THREEx.GeometricGlowMesh = function(mesh){
	var object3d	= new THREE.Object3D

	var geometry	= mesh.geometry.clone()
	THREEx.dilateGeometry(geometry, 0.01)
	var material	= THREEx.createAtmosphereMaterial()
	material.uniforms.glowColor.value	= new THREE.Color('cyan')
	material.uniforms.coeficient.value	= 1.1
	material.uniforms.power.value		= 1.4
	var insideMesh	= new THREE.Mesh(geometry, material );
	object3d.add( insideMesh );


	var geometry	= mesh.geometry.clone()
	THREEx.dilateGeometry(geometry, 0.1)
	var material	= THREEx.createAtmosphereMaterial()
	material.uniforms.glowColor.value	= new THREE.Color('cyan')
	material.uniforms.coeficient.value	= 0.1
	material.uniforms.power.value		= 1.2
	material.side	= THREE.BackSide
	var outsideMesh	= new THREE.Mesh( geometry, material );
	object3d.add( outsideMesh );

	// expose a few variable
	this.object3d	= object3d
	this.insideMesh	= insideMesh
	this.outsideMesh= outsideMesh
}