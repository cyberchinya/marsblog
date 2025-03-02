import * as THREE from 'three';

// Создаем сцену
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = 5;

// Создаем рендерер и добавляем его в начало body
const renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.prepend(renderer.domElement);

// Загружаем текстуру звезды
const starTexture = new THREE.TextureLoader().load('/images/star.png'); // Путь к файлу звезды

// Создаем геометрию для частиц
const starsGeometry = new THREE.BufferGeometry();
const starCount = 500;
const positions = new Float32Array(starCount * 3);

for (let i = 0; i < starCount * 3; i++) {
    positions[i] = (Math.random() - 0.5) * 10; // Разбрасываем звезды по пространству
}

starsGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

// Создаем материал с текстурой звезды
const starsMaterial = new THREE.PointsMaterial({
    map: starTexture,
    size: 0.2, // Размер звезды
    transparent: true,
    depthWrite: false, 
    blending: THREE.AdditiveBlending, // Добавляем эффект свечения
});

// Создаем систему частиц
const starField = new THREE.Points(starsGeometry, starsMaterial);
scene.add(starField);

// Анимация звезд (вращение)
function animate() {
    requestAnimationFrame(animate);
    starField.rotation.y += 0.0005; // Медленное вращение звезд
    renderer.render(scene, camera);
}

animate();

// Адаптация при изменении размера окна
window.addEventListener('resize', () => {
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
});

