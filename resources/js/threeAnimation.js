import * as THREE from 'three';

/**
 * Настройка сцены, камеры и рендерера.
 * @returns {Object} Объект с элементами сцены, камеры и рендерера.
 */
function setupScene() {
    const scene = new THREE.Scene();

    // Настройка камеры
    const camera = new THREE.PerspectiveCamera(
        75, 
        window.innerWidth / window.innerHeight, 
        0.1, 
        1000
    );
    camera.position.z = 5;

    // Настройка рендерера
    const renderer = new THREE.WebGLRenderer({ alpha: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.prepend(renderer.domElement);

    return { scene, camera, renderer };
}

/**
 * Загружает текстуру звезды.
 * @param {string} path - Путь к файлу текстуры.
 * @returns {THREE.Texture} Загруженная текстура.
 */
function loadStarTexture(path) {
    return new THREE.TextureLoader().load(
        path,
        undefined, // onLoad
        undefined, // onProgress
        (error) => console.error('Ошибка загрузки текстуры:', error)
    );
}

/**
 * Создает звездное поле из частиц.
 * @param {number} starCount - Количество звезд.
 * @param {THREE.Texture} texture - Текстура для звезд.
 * @returns {THREE.Points} Объект звездного поля.
 */
function createStarField(starCount, texture) {
    const starsGeometry = new THREE.BufferGeometry();
    const positions = new Float32Array(starCount * 3);

    // Генерация случайных позиций для звезд
    for (let i = 0; i < starCount * 3; i++) {
        positions[i] = (Math.random() - 0.5) * 10;
    }

    starsGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

    // Материал для звезд
    const starsMaterial = new THREE.PointsMaterial({
        map: texture,
        size: 0.08,
        transparent: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending, // Эффект свечения
    });

    return new THREE.Points(starsGeometry, starsMaterial);
}

/**
 * Запускает анимацию сцены.
 * @param {THREE.Scene} scene - Сцена.
 * @param {THREE.Camera} camera - Камера.
 * @param {THREE.WebGLRenderer} renderer - Рендерер.
 * @param {THREE.Points} starField - Звездное поле.
 */
function animateScene(scene, camera, renderer, starField) {
    function animate() {
        requestAnimationFrame(animate);

        // Медленное вращение звездного поля
        starField.rotation.y += 0.0005;

        // Рендеринг сцены
        renderer.render(scene, camera);
    }

    animate();
}

/**
 * Настраивает обработчик изменения размера окна.
 * @param {THREE.Camera} camera - Камера.
 * @param {THREE.WebGLRenderer} renderer - Рендерер.
 */
function setupResizeHandler(camera, renderer) {
    let resizeTimeout;

    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            const width = window.innerWidth;
            const height = window.innerHeight;

            renderer.setSize(width, height);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
        }, 100); // Задержка в 100 мс
    });
}

/**
 * Добавляет аудио на страницу.
 * @param {string} path - Путь к аудиофайлу.
 */
function addBackgroundMusic(path) {
    const audio = document.createElement('audio');
    audio.src = path;
    audio.loop = true; // Зацикливание музыки
    audio.autoplay = true; // Автоматическое воспроизведение
    audio.volume = 0.5; // Громкость (от 0 до 1)
    document.body.appendChild(audio);

    // Воспроизведение музыки после первого взаимодействия с пользователем
    document.addEventListener('click', () => {
        if (audio.paused) {
            audio.play();
        }
    }, { once: true });
}

// Основная функция инициализации
function init() {
    const { scene, camera, renderer } = setupScene();

    // Загрузка текстуры звезды
    const starTexture = loadStarTexture('/images/star.png');

    // Создание звездного поля
    const starField = createStarField(500, starTexture);
    scene.add(starField);

    // Запуск анимации
    animateScene(scene, camera, renderer, starField);

    // Настройка обработчика изменения размера окна
    setupResizeHandler(camera, renderer);

    // Добавление фоновой музыки
    addBackgroundMusic('/audio/music.mp3'); // Укажите путь к вашему аудиофайлу
}

// Запуск приложения
init();