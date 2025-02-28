import * as THREE from 'three';

// 1. Инициализация сцены
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ alpha: true }); // Прозрачный фон
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.prepend(renderer.domElement);

// 2. Создаём частицы
const particlesCount = 2000;
const particlesGeometry = new THREE.BufferGeometry();
const positions = new Float32Array(particlesCount * 3);

for (let i = 0; i < particlesCount * 3; i++) {
    positions[i] = (Math.random() - 0.5) * 10;
}

particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

const particlesMaterial = new THREE.PointsMaterial({
    color: 0x44ff44, // Ядовито-зелёный цвет
    size: 0.05,
    transparent: true,
    opacity: 0.5,
});

const particles = new THREE.Points(particlesGeometry, particlesMaterial);
scene.add(particles);

// 3. Камера и анимация
camera.position.z = 5;

const animate = () => {
    requestAnimationFrame(animate);
    
    // Двигаем частицы
    particles.rotation.y += 0.0005;
    particles.rotation.x += 0.0002;
    
    renderer.render(scene, camera);
};

animate();

// 4. Адаптация к изменению размеров экрана
window.addEventListener('resize', () => {
    const width = window.innerWidth;
    const height = window.innerHeight;
    
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    
    renderer.setSize(width, height);
});