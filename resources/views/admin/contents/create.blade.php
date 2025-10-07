@extends('layouts.skeleton_clear')

@section('title', 'Crear Contenido')
@section('page-title', 'Crear Contenido')

@section('app')
<div class="h-screen flex bg-primary">
    {{-- Sidebar izquierdo - Navegación de contenidos --}}
    <div class="w-80 bg-secondary border-r border-primary flex flex-col">
        {{-- Header del sidebar --}}
        <div class="p-4 border-b border-primary">
            <h2 class="text-lg font-semibold text-primary">Contenidos</h2>
            <p class="text-sm text-secondary">Gestiona tus elementos</p>
        </div>

        {{-- Lista de contenidos --}}
        <div class="flex-1 overflow-y-auto p-4 space-y-3" id="contents-list">
            {{-- Contenido 1 - Activo --}}
            <div class="content-item active bg-primary border border-primary rounded-lg p-3 cursor-pointer transition-all duration-200 hover:shadow-md" data-content="1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-primary">1 Quiz</span>
                    <div class="flex items-center space-x-1">
                        <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs text-tertiary">60s</span>
                    </div>
                </div>
                <p class="text-sm text-secondary truncate">¿Qué son las bases de datos?</p>
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center space-x-1">
                        <svg class="w-3 h-3 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        <span class="text-xs text-tertiary">Quiz</span>
                    </div>
                    <div class="w-2 h-2 bg-success-500 rounded-full"></div>
                </div>
            </div>

            {{-- Contenido 2 --}}
            <div class="content-item bg-primary border border-primary rounded-lg p-3 cursor-pointer transition-all duration-200 hover:shadow-md" data-content="2">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-primary">2 Quiz</span>
                    <div class="flex items-center space-x-1">
                        <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs text-tertiary">30s</span>
                    </div>
                </div>
                <p class="text-sm text-secondary truncate">¿Cuál es la diferencia entre...</p>
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center space-x-1">
                        <svg class="w-3 h-3 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs text-tertiary">V/F</span>
                    </div>
                    <div class="w-2 h-2 bg-warning-500 rounded-full"></div>
                </div>
            </div>

            {{-- Contenido 3 --}}
            <div class="content-item bg-primary border border-primary rounded-lg p-3 cursor-pointer transition-all duration-200 hover:shadow-md" data-content="3">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-primary">3 Slide</span>
                    <div class="flex items-center space-x-1">
                        <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs text-tertiary">∞</span>
                    </div>
                </div>
                <p class="text-sm text-secondary truncate">Introducción a las bases de datos</p>
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center space-x-1">
                        <svg class="w-3 h-3 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h3a1 1 0 110 2h-1v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6H4a1 1 0 110-2h3zM9 6v10h6V6H9z"></path>
                        </svg>
                        <span class="text-xs text-tertiary">Slide</span>
                    </div>
                    <div class="w-2 h-2 bg-tertiary rounded-full"></div>
                </div>
            </div>
        </div>

        {{-- Botones de acción --}}
        <div class="p-4 border-t border-primary space-y-2">
            <button onclick="addContent('quiz')" class="w-full btn-primary text-sm py-2 px-4 rounded-lg flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span>Añadir pregunta</span>
            </button>
            <button onclick="addContent('slide')" class="w-full btn-secondary text-sm py-2 px-4 rounded-lg flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h3a1 1 0 110 2h-1v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6H4a1 1 0 110-2h3zM9 6v10h6V6H9z"></path>
                </svg>
                <span>Añadir diapositiva</span>
            </button>
        </div>
    </div>

    {{-- Área central - Editor visual --}}
    <div class="flex-1 flex flex-col bg-primary">
        {{-- Header del editor --}}
        <div class="p-4 border-b border-primary">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-primary" id="current-content-title">¿Qué son las bases de datos?</h3>
                    <p class="text-sm text-secondary">Edita tu contenido de forma visual</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="p-2 text-tertiary hover:text-primary hover:bg-secondary rounded-lg transition-colors duration-200" title="Añadir imagen">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </button>
                    <button class="p-2 text-tertiary hover:text-primary hover:bg-secondary rounded-lg transition-colors duration-200" title="Información">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <button class="p-2 text-error-600 hover:text-error-700 hover:bg-error-50 rounded-lg transition-colors duration-200" title="Eliminar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Área de edición visual --}}
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="max-w-4xl mx-auto">
                {{-- Imagen del contenido --}}
                <div class="mb-8">
                    <div class="bg-white rounded-lg border-2 border-dashed border-tertiary p-8 text-center hover:border-primary transition-colors duration-200 cursor-pointer" id="image-upload-area">
                        <div class="space-y-4">
                            <div class="mx-auto w-32 h-32 bg-secondary rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-medium text-primary">Añadir imagen</p>
                                <p class="text-sm text-secondary">Arrastra una imagen aquí o haz clic para seleccionar</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Opciones de respuesta --}}
                <div class="space-y-4" id="answer-options">
                    {{-- Opción 1 --}}
                    <div class="answer-option bg-red-500 text-white rounded-lg p-4 cursor-pointer hover:bg-red-600 transition-colors duration-200" data-option="1">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">Un programa para hacer gráficos</span>
                            </div>
                            <div class="w-6 h-6 border-2 border-white border-opacity-50 rounded-full"></div>
                        </div>
                    </div>

                    {{-- Opción 2 --}}
                    <div class="answer-option bg-blue-500 text-white rounded-lg p-4 cursor-pointer hover:bg-blue-600 transition-colors duration-200" data-option="2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">Un programa en Excel</span>
                            </div>
                            <div class="w-6 h-6 border-2 border-white border-opacity-50 rounded-full"></div>
                        </div>
                    </div>

                    {{-- Opción 3 (Correcta) --}}
                    <div class="answer-option bg-yellow-500 text-white rounded-lg p-4 cursor-pointer hover:bg-yellow-600 transition-colors duration-200 correct-answer" data-option="3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">Es un lugar donde se guardan muchos datos</span>
                            </div>
                            <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Opción 4 --}}
                    <div class="answer-option bg-green-500 text-white rounded-lg p-4 cursor-pointer hover:bg-green-600 transition-colors duration-200" data-option="4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 4h10v2H7v-2zm0 4h7v2H7v-2z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">Una carpeta que contiene muchos archivos</span>
                            </div>
                            <div class="w-6 h-6 border-2 border-white border-opacity-50 rounded-full"></div>
                        </div>
                    </div>
                </div>

                {{-- Botón añadir más respuestas --}}
                <div class="mt-6 text-center">
                    <button onclick="addAnswerOption()" class="btn-secondary inline-flex items-center space-x-2 px-4 py-2 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Añadir más respuestas</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar derecho - Panel de opciones --}}
    <div class="w-80 bg-secondary border-l border-primary flex flex-col">
        {{-- Header del panel --}}
        <div class="p-4 border-b border-primary">
            <h3 class="text-lg font-semibold text-primary">Opciones</h3>
            <p class="text-sm text-secondary">Configura tu contenido</p>
        </div>

        {{-- Contenido del panel --}}
        <div class="flex-1 overflow-y-auto p-4 space-y-6">
            {{-- Tipo de pregunta --}}
            <div>
                <label class="block text-sm font-medium text-primary mb-3">Tipo de pregunta</label>
                <div class="relative">
                    <select id="question-type" class="input w-full appearance-none cursor-pointer">
                        <option value="quiz">Quiz</option>
                        <option value="true-false">Verdadero o falso</option>
                        <option value="short-answer">Respuesta corta</option>
                        <option value="slider">Control deslizante</option>
                        <option value="pin">Respuesta con pin</option>
                        <option value="puzzle">Puzzle</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Tiempo límite --}}
            <div>
                <label class="block text-sm font-medium text-primary mb-3">Tiempo límite</label>
                <div class="flex items-center space-x-2">
                    <input type="number" id="time-limit" value="60" min="5" max="300" step="5" class="input flex-1">
                    <span class="text-sm text-secondary">segundos</span>
                </div>
            </div>

            {{-- Puntos --}}
            <div>
                <label class="block text-sm font-medium text-primary mb-3">Puntos</label>
                <div class="flex items-center space-x-2">
                    <input type="number" id="points" value="1000" min="0" max="2000" step="100" class="input flex-1">
                    <span class="text-sm text-secondary">pts</span>
                </div>
            </div>

            {{-- Dificultad --}}
            <div>
                <label class="block text-sm font-medium text-primary mb-3">Dificultad</label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="difficulty" value="easy" class="text-primary focus:ring-primary-500">
                        <span class="ml-2 text-sm text-secondary">Fácil</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="difficulty" value="medium" checked class="text-primary focus:ring-primary-500">
                        <span class="ml-2 text-sm text-secondary">Medio</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="difficulty" value="hard" class="text-primary focus:ring-primary-500">
                        <span class="ml-2 text-sm text-secondary">Difícil</span>
                    </label>
                </div>
            </div>

            {{-- Configuraciones adicionales --}}
            <div>
                <label class="block text-sm font-medium text-primary mb-3">Configuraciones</label>
                <div class="space-y-3">
                    <label class="flex items-center justify-between">
                        <span class="text-sm text-secondary">Mostrar respuestas aleatorias</span>
                        <input type="checkbox" id="randomize-answers" class="text-primary focus:ring-primary-500">
                    </label>
                    <label class="flex items-center justify-between">
                        <span class="text-sm text-secondary">Permitir múltiples intentos</span>
                        <input type="checkbox" id="multiple-attempts" class="text-primary focus:ring-primary-500">
                    </label>
                    <label class="flex items-center justify-between">
                        <span class="text-sm text-secondary">Mostrar explicación</span>
                        <input type="checkbox" id="show-explanation" checked class="text-primary focus:ring-primary-500">
                    </label>
                </div>
            </div>
        </div>

        {{-- Botones de acción --}}
        <div class="p-4 border-t border-primary space-y-2">
            <button onclick="duplicateContent()" class="w-full btn-secondary text-sm py-2 px-4 rounded-lg">
                Duplicar
            </button>
            <button onclick="deleteContent()" class="w-full bg-error-600 hover:bg-error-700 text-white text-sm py-2 px-4 rounded-lg transition-colors duration-200">
                Eliminar
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
// ========================================
// SISTEMA DE GESTIÓN DE CONTENIDOS
// ========================================
class ContentManager {
    constructor() {
        this.currentContent = 1;
        this.contents = {
            1: {
                id: 1,
                type: 'quiz',
                title: '¿Qué son las bases de datos?',
                image: null,
                options: [
                    { id: 1, text: 'Un programa para hacer gráficos', correct: false, color: 'red' },
                    { id: 2, text: 'Un programa en Excel', correct: false, color: 'blue' },
                    { id: 3, text: 'Es un lugar donde se guardan muchos datos', correct: true, color: 'yellow' },
                    { id: 4, text: 'Una carpeta que contiene muchos archivos', correct: false, color: 'green' }
                ],
                timeLimit: 60,
                points: 1000,
                difficulty: 'medium',
                settings: {
                    randomizeAnswers: false,
                    multipleAttempts: false,
                    showExplanation: true
                }
            },
            2: {
                id: 2,
                type: 'true-false',
                title: '¿Cuál es la diferencia entre...',
                image: null,
                options: [
                    { id: 1, text: 'Verdadero', correct: true, color: 'green' },
                    { id: 2, text: 'Falso', correct: false, color: 'red' }
                ],
                timeLimit: 30,
                points: 500,
                difficulty: 'easy',
                settings: {
                    randomizeAnswers: false,
                    multipleAttempts: true,
                    showExplanation: false
                }
            },
            3: {
                id: 3,
                type: 'slide',
                title: 'Introducción a las bases de datos',
                image: null,
                content: 'Contenido de la diapositiva...',
                timeLimit: 0,
                points: 0,
                difficulty: 'easy',
                settings: {}
            }
        };

        this.init();
    }

    init() {
        this.bindEvents();
        this.loadContent(this.currentContent);
    }

    bindEvents() {
        // Navegación de contenidos
        document.querySelectorAll('.content-item').forEach(item => {
            item.addEventListener('click', (e) => {
                const contentId = parseInt(e.currentTarget.dataset.content);
                this.selectContent(contentId);
            });
        });

        // Selección de respuestas
        document.querySelectorAll('.answer-option').forEach(option => {
            option.addEventListener('click', (e) => {
                this.selectAnswer(parseInt(e.currentTarget.dataset.option));
            });
        });

        // Cambios en el panel de opciones
        document.getElementById('question-type').addEventListener('change', (e) => {
            this.updateQuestionType(e.target.value);
        });

        document.getElementById('time-limit').addEventListener('change', (e) => {
            this.updateTimeLimit(parseInt(e.target.value));
        });

        document.getElementById('points').addEventListener('change', (e) => {
            this.updatePoints(parseInt(e.target.value));
        });

        // Configuraciones
        document.getElementById('randomize-answers').addEventListener('change', (e) => {
            this.updateSetting('randomizeAnswers', e.target.checked);
        });

        document.getElementById('multiple-attempts').addEventListener('change', (e) => {
            this.updateSetting('multipleAttempts', e.target.checked);
        });

        document.getElementById('show-explanation').addEventListener('change', (e) => {
            this.updateSetting('showExplanation', e.target.checked);
        });

        // Dificultad
        document.querySelectorAll('input[name="difficulty"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                this.updateDifficulty(e.target.value);
            });
        });
    }

    selectContent(contentId) {
        // Actualizar UI
        document.querySelectorAll('.content-item').forEach(item => {
            item.classList.remove('active', 'bg-primary', 'border-primary');
            item.classList.add('bg-primary', 'border-primary');
        });

        const selectedItem = document.querySelector(`[data-content="${contentId}"]`);
        selectedItem.classList.add('active', 'bg-primary', 'border-primary');

        // Cargar contenido
        this.currentContent = contentId;
        this.loadContent(contentId);
    }

    loadContent(contentId) {
        const content = this.contents[contentId];
        if (!content) return;

        // Actualizar título
        document.getElementById('current-content-title').textContent = content.title;

        // Actualizar tipo de pregunta
        document.getElementById('question-type').value = content.type;

        // Actualizar tiempo límite
        document.getElementById('time-limit').value = content.timeLimit;

        // Actualizar puntos
        document.getElementById('points').value = content.points;

        // Actualizar dificultad
        document.querySelector(`input[name="difficulty"][value="${content.difficulty}"]`).checked = true;

        // Actualizar configuraciones
        if (content.settings) {
            document.getElementById('randomize-answers').checked = content.settings.randomizeAnswers || false;
            document.getElementById('multiple-attempts').checked = content.settings.multipleAttempts || false;
            document.getElementById('show-explanation').checked = content.settings.showExplanation || false;
        }

        // Actualizar opciones de respuesta
        this.updateAnswerOptions(content.options);
    }

    updateAnswerOptions(options) {
        const container = document.getElementById('answer-options');
        container.innerHTML = '';

        options.forEach(option => {
            const optionElement = this.createAnswerOption(option);
            container.appendChild(optionElement);
        });
    }

    createAnswerOption(option) {
        const div = document.createElement('div');
        div.className = `answer-option bg-${option.color}-500 text-white rounded-lg p-4 cursor-pointer hover:bg-${option.color}-600 transition-colors duration-200`;
        div.dataset.option = option.id;

        const icon = this.getOptionIcon(option.id);
        const checkIcon = option.correct ?
            '<svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path></svg>' :
            '<div class="w-6 h-6 border-2 border-white border-opacity-50 rounded-full"></div>';

        div.innerHTML = `
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        ${icon}
                    </div>
                    <span class="font-medium">${option.text}</span>
                </div>
                ${checkIcon}
            </div>
        `;

        div.addEventListener('click', () => this.selectAnswer(option.id));
        return div;
    }

    getOptionIcon(optionId) {
        const icons = {
            1: '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>',
            2: '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>',
            3: '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>',
            4: '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 4h10v2H7v-2zm0 4h7v2H7v-2z"></path></svg>'
        };
        return icons[optionId] || icons[1];
    }

    selectAnswer(optionId) {
        const content = this.contents[this.currentContent];
        if (!content || !content.options) return;

        // Marcar/desmarcar como correcta
        const option = content.options.find(opt => opt.id === optionId);
        if (option) {
            option.correct = !option.correct;
            this.loadContent(this.currentContent);
        }
    }

    updateQuestionType(type) {
        this.contents[this.currentContent].type = type;
        console.log(`Tipo de pregunta cambiado a: ${type}`);
    }

    updateTimeLimit(time) {
        this.contents[this.currentContent].timeLimit = time;
        console.log(`Tiempo límite cambiado a: ${time} segundos`);
    }

    updatePoints(points) {
        this.contents[this.currentContent].points = points;
        console.log(`Puntos cambiados a: ${points}`);
    }

    updateDifficulty(difficulty) {
        this.contents[this.currentContent].difficulty = difficulty;
        console.log(`Dificultad cambiada a: ${difficulty}`);
    }

    updateSetting(key, value) {
        if (!this.contents[this.currentContent].settings) {
            this.contents[this.currentContent].settings = {};
        }
        this.contents[this.currentContent].settings[key] = value;
        console.log(`Configuración ${key} cambiada a: ${value}`);
    }

    addContent(type) {
        const newId = Math.max(...Object.keys(this.contents).map(Number)) + 1;
        const newContent = {
            id: newId,
            type: type,
            title: type === 'quiz' ? 'Nueva pregunta' : 'Nueva diapositiva',
            image: null,
            options: type === 'quiz' ? [
                { id: 1, text: 'Opción 1', correct: false, color: 'red' },
                { id: 2, text: 'Opción 2', correct: false, color: 'blue' },
                { id: 3, text: 'Opción 3', correct: true, color: 'yellow' },
                { id: 4, text: 'Opción 4', correct: false, color: 'green' }
            ] : [],
            timeLimit: type === 'quiz' ? 60 : 0,
            points: type === 'quiz' ? 1000 : 0,
            difficulty: 'medium',
            settings: {
                randomizeAnswers: false,
                multipleAttempts: false,
                showExplanation: true
            }
        };

        this.contents[newId] = newContent;
        this.addContentToSidebar(newContent);
        this.selectContent(newId);
    }

    addContentToSidebar(content) {
        const container = document.getElementById('contents-list');
        const contentElement = document.createElement('div');
        contentElement.className = 'content-item bg-primary border border-primary rounded-lg p-3 cursor-pointer transition-all duration-200 hover:shadow-md';
        contentElement.dataset.content = content.id;

        const typeIcon = content.type === 'quiz' ?
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>' :
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h3a1 1 0 110 2h-1v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6H4a1 1 0 110-2h3zM9 6v10h6V6H9z"></path>';

        contentElement.innerHTML = `
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-primary">${content.id} ${content.type === 'quiz' ? 'Quiz' : 'Slide'}</span>
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-xs text-tertiary">${content.timeLimit}s</span>
                </div>
            </div>
            <p class="text-sm text-secondary truncate">${content.title}</p>
            <div class="flex items-center justify-between mt-2">
                <div class="flex items-center space-x-1">
                    <svg class="w-3 h-3 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        ${typeIcon}
                    </svg>
                    <span class="text-xs text-tertiary">${content.type === 'quiz' ? 'Quiz' : 'Slide'}</span>
                </div>
                <div class="w-2 h-2 bg-tertiary rounded-full"></div>
            </div>
        `;

        contentElement.addEventListener('click', () => this.selectContent(content.id));
        container.appendChild(contentElement);
    }

    addAnswerOption() {
        const content = this.contents[this.currentContent];
        if (!content || !content.options) return;

        const newId = Math.max(...content.options.map(opt => opt.id)) + 1;
        const colors = ['red', 'blue', 'yellow', 'green', 'purple', 'pink', 'indigo', 'teal'];
        const color = colors[content.options.length % colors.length];

        const newOption = {
            id: newId,
            text: `Opción ${newId}`,
            correct: false,
            color: color
        };

        content.options.push(newOption);
        this.loadContent(this.currentContent);
    }

    duplicateContent() {
        const content = this.contents[this.currentContent];
        if (!content) return;

        const newId = Math.max(...Object.keys(this.contents).map(Number)) + 1;
        const duplicatedContent = JSON.parse(JSON.stringify(content));
        duplicatedContent.id = newId;
        duplicatedContent.title = `${content.title} (Copia)`;

        this.contents[newId] = duplicatedContent;
        this.addContentToSidebar(duplicatedContent);
        this.selectContent(newId);
    }

    deleteContent() {
        if (Object.keys(this.contents).length <= 1) {
            alert('No puedes eliminar el último contenido');
            return;
        }

        if (confirm('¿Estás seguro de que quieres eliminar este contenido?')) {
            delete this.contents[this.currentContent];

            // Remover del sidebar
            const contentElement = document.querySelector(`[data-content="${this.currentContent}"]`);
            if (contentElement) {
                contentElement.remove();
            }

            // Seleccionar el primer contenido disponible
            const firstContentId = parseInt(Object.keys(this.contents)[0]);
            this.selectContent(firstContentId);
        }
    }

    // Método para obtener todos los contenidos (útil para guardar)
    getAllContents() {
        return this.contents;
    }

    // Método para guardar contenidos
    saveContents() {
        console.log('Guardando contenidos:', this.contents);
        // Aquí implementarías la lógica para guardar en el servidor
    }
}

// ========================================
// FUNCIONES GLOBALES
// ========================================
let contentManager;

function addContent(type) {
    contentManager.addContent(type);
}

function addAnswerOption() {
    contentManager.addAnswerOption();
}

function duplicateContent() {
    contentManager.duplicateContent();
}

function deleteContent() {
    contentManager.deleteContent();
}

// ========================================
// INICIALIZACIÓN
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    contentManager = new ContentManager();
    console.log('✅ Sistema de gestión de contenidos inicializado');
});

// Hacer funciones globales
window.addContent = addContent;
window.addAnswerOption = addAnswerOption;
window.duplicateContent = duplicateContent;
window.deleteContent = deleteContent;
</script>
@endpush
