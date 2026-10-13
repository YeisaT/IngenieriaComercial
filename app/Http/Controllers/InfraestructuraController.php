<?php

namespace App\Http\Controllers;

class InfraestructuraController extends Controller
{
    // Datos de cada sección — centralizados aquí
    private array $secciones = [
        'sepeg' => [
            'titulo'    => 'Sala SEPEG',
            'subtitulo' => 'Sistema de Evaluación y Preparación para el Examen de Grado',
            'icono'     => 'fa-tv',
            'piso'      => '1er Piso',
            'badge'     => 'Tecnología Avanzada',
            'badge_class' => '',
            'intro'     => 'La <strong>Sala SEPEG</strong> es el espacio tecnológico más avanzado de la carrera, diseñado específicamente para fortalecer la preparación de los estudiantes en el <strong>Examen de Grado</strong>. Representa una inversión directa en la calidad académica y el éxito de los egresados de Ingeniería Comercial.',
            'imagen_hero'      => 'img/Sala_Tecnologica_Sepeg.jpeg',
            'imagen_contenido' => 'img/Sala_Tecnologica_Sepeg2.jpeg',
            'columnas' => [
                [
                    'titulo' => 'Equipamiento tecnológico',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Pantalla interactiva táctil de última generación'],
                        ['icon' => 'fa-check', 'text' => 'Sistema de proyección de alta definición'],
                        ['icon' => 'fa-check', 'text' => 'Ambiente climatizado con aire acondicionado'],
                        ['icon' => 'fa-check', 'text' => 'Conectividad a Internet de alta velocidad'],
                    ],
                ],
                [
                    'titulo' => 'Condiciones del espacio',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Mobiliario ergonómico para estudio intensivo'],
                        ['icon' => 'fa-check', 'text' => 'Acceso exclusivo para estudiantes en proceso de graduación'],
                        ['icon' => 'fa-check', 'text' => 'Iluminación adecuada para largas sesiones de estudio'],
                        ['icon' => 'fa-check', 'text' => 'Capacidad para grupos reducidos de trabajo'],
                    ],
                ],
            ],
            'nota' => 'Utilizada para talleres de preparación, simulacros del examen y sesiones de refuerzo coordinadas por la Unidad de Graduación.',
            'nota_icon' => 'fa-circle-info',
        ],
        'aulas' => [
            'titulo'    => 'Aulas y Tecnología',
            'subtitulo' => '24 aulas equipadas para una formación de excelencia',
            'icono'     => 'fa-chalkboard-user',
            'piso'      => 'Todos los pisos',
            'badge'     => '24 Aulas',
            'badge_class' => 'ic-detail-badge--blue',
            'intro'     => 'El Módulo 264 cuenta con <strong>24 aulas equipadas</strong> distribuidas en todos los pisos del edificio, diseñadas para brindar un ambiente de aprendizaje óptimo. Cada aula está pensada para garantizar la comodidad del estudiante y la efectividad del proceso de enseñanza.',
            'imagen_hero'      => 'img/Aulas1.jpeg',
            'imagen_contenido' => 'img/Aulas2.jpeg',
            'stats' => [
                ['num' => '24', 'label' => 'Aulas totales'],
                ['num' => '50', 'label' => 'Cap. estándar'],
                ['num' => '80', 'label' => 'Cap. ampliada'],
            ],
            'columnas' => [
                [
                    'titulo' => 'Equipamiento por aula',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Mobiliario ergonómico universitario'],
                        ['icon' => 'fa-check', 'text' => 'Proyector multimedia de alta resolución'],
                        ['icon' => 'fa-check', 'text' => 'Pantalla de proyección retráctil'],
                        ['icon' => 'fa-check', 'text' => 'Sistema de sonido integrado'],
                    ],
                ],
                [
                    'titulo' => 'Infraestructura general',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Pizarrón acrílico de gran formato'],
                        ['icon' => 'fa-check', 'text' => 'Iluminación LED de bajo consumo'],
                        ['icon' => 'fa-check', 'text' => 'Ventilación adecuada en cada espacio'],
                        ['icon' => 'fa-check', 'text' => 'Acceso para personas con movilidad reducida'],
                    ],
                ],
            ],
            'nota' => null,
        ],
        'computo' => [
            'titulo'    => 'Salas de Cómputo',
            'subtitulo' => 'Dos laboratorios de informática en el 3er piso',
            'icono'     => 'fa-desktop',
            'piso'      => '3er Piso',
            'badge'     => '2 Salas',
            'badge_class' => '',
            'intro'     => 'Las <strong>Salas de Cómputo</strong> están ubicadas en el <strong>3er piso</strong> del Módulo 264. Cuentan con equipos de última generación para el desarrollo de actividades académicas que requieren herramientas informáticas especializadas.',
            'imagen_hero'      => 'img/Sala_de_Computo.jpeg',
            'imagen_contenido' => 'img/Sala_de_Computo2.jpeg',
            'salas' => [
                ['nombre' => 'Sala N° 1', 'capacidad' => '28 personas', 'items' => ['Computadoras actualizadas', 'Internet de alta velocidad', 'Aire acondicionado', 'Proyector multimedia']],
                ['nombre' => 'Sala N° 2', 'capacidad' => '50 personas', 'items' => ['Computadoras actualizadas', 'Internet de alta velocidad', 'Aire acondicionado', 'Proyector multimedia']],
            ],
            'nota' => 'Las salas están disponibles para clases programadas y uso libre en horarios establecidos por la Secretaría de Carrera.',
            'nota_icon' => 'fa-circle-info',
        ],
        'lectura' => [
            'titulo'    => 'Sala de Lectura',
            'subtitulo' => 'Espacio de estudio y concentración en el 2do piso',
            'icono'     => 'fa-book-open',
            'piso'      => '2do Piso',
            'badge'     => 'Zona de silencio',
            'badge_class' => 'ic-detail-badge--muted',
            'intro'     => 'La <strong>Sala de Lectura</strong> está ubicada en el <strong>2do piso</strong> del Módulo 264. Es un espacio diseñado para el estudio profundo, la concentración y la investigación académica, con un ambiente de <strong>silencio y tranquilidad</strong> que favorece el aprendizaje autónomo.',
            'imagen_hero'      => 'img/Sala_de_Lectura.jpeg',
            'imagen_contenido' => 'img/Sala_de_Lectura_EstanteLibros.jpeg',
            'columnas' => [
                [
                    'titulo' => 'Características del espacio',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Ambiente de silencio y concentración garantizado'],
                        ['icon' => 'fa-check', 'text' => 'Iluminación natural abundante y luz artificial de bajo impacto visual'],
                        ['icon' => 'fa-check', 'text' => 'Mesas amplias para trabajo individual y grupal'],
                        ['icon' => 'fa-check', 'text' => 'Sillas ergonómicas para sesiones prolongadas de estudio'],
                    ],
                ],
                [
                    'titulo' => 'Servicios disponibles',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Acceso a material bibliográfico de referencia'],
                        ['icon' => 'fa-check', 'text' => 'Conectividad Wi-Fi disponible'],
                        ['icon' => 'fa-check', 'text' => 'Ambiente climatizado'],
                        ['icon' => 'fa-check', 'text' => 'Casilleros para guardar pertenencias'],
                    ],
                ],
            ],
            'nota' => 'Se solicita mantener silencio y apagar o silenciar dispositivos móviles dentro de la sala para respetar el ambiente de estudio.',
            'nota_icon' => 'fa-volume-xmark',
        ],
        'auditorio' => [
            'titulo'    => 'Auditorio',
            'subtitulo' => 'Espacio para conferencias y eventos académicos en el 4to piso',
            'icono'     => 'fa-microphone-lines',
            'piso'      => '4to Piso',
            'badge'     => 'Eventos y Conferencias',
            'badge_class' => 'ic-detail-badge--blue',
            'intro'     => 'El <strong>Auditorio</strong> del Módulo 264 se encuentra en el <strong>4to piso</strong> y es el espacio principal para eventos académicos, conferencias, seminarios y actos institucionales de la carrera. Su diseño y equipamiento lo convierten en un escenario profesional para actividades de mediana y gran escala.',
            'imagen_hero'      => 'img/Salon_Auditorio.jpeg',
            'imagen_contenido' => 'img/Salon_Auditorio1.jpeg',
            'columnas' => [
                [
                    'titulo' => 'Equipamiento',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Sistema de audio profesional con micrófonos inalámbricos y de podio'],
                        ['icon' => 'fa-check', 'text' => 'Proyector de alta luminosidad con pantalla de gran formato'],
                        ['icon' => 'fa-check', 'text' => 'Butacas confortables con soporte ergonómico'],
                        ['icon' => 'fa-check', 'text' => 'Aire acondicionado central e iluminación escénica regulable'],
                    ],
                ],
                [
                    'titulo' => 'Usos principales',
                    'items'  => [
                        ['icon' => 'fa-star', 'text' => 'Conferencias y seminarios académicos'],
                        ['icon' => 'fa-star', 'text' => 'Actos de graduación y entrega de diplomas'],
                        ['icon' => 'fa-star', 'text' => 'Presentaciones de proyectos de investigación'],
                        ['icon' => 'fa-star', 'text' => 'Eventos institucionales y culturales'],
                    ],
                ],
            ],
            'nota' => 'Para reservar el auditorio, comunícate con la Secretaría de Carrera en Planta Baja con al menos 72 horas de anticipación.',
            'nota_icon' => 'fa-calendar-check',
        ],
        'direccion' => [
            'titulo'    => 'Dirección y Secretaría',
            'subtitulo' => 'Centro de gestión académica y atención al estudiante',
            'icono'     => 'fa-door-open',
            'piso'      => 'Planta Baja',
            'badge'     => 'Lun–Vie 8:00–18:30',
            'badge_class' => 'ic-detail-badge--muted',
            'director'  => 'MSc. Eddy Moises Arnez Garcia',
            'director_cargo' => 'Director de Carrera',
            'intro'     => 'La <strong>Dirección de Carrera</strong> y la <strong>Secretaría</strong> se encuentran en la <strong>Planta Baja</strong> del Módulo 264, siendo el punto central de gestión académica y administrativa, y el primer punto de contacto para estudiantes, docentes y visitantes.',
            'imagen_hero'      => 'img/Infraestructura_Modulo.jpg',
            'imagen_contenido' => 'img/JefedeCarrera.jpg',
            'columnas' => [
                [
                    'titulo' => 'Funciones de la Dirección',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Coordinación y supervisión de actividades académicas'],
                        ['icon' => 'fa-check', 'text' => 'Planificación curricular y seguimiento docente'],
                        ['icon' => 'fa-check', 'text' => 'Gestión de convenios y relaciones institucionales'],
                        ['icon' => 'fa-check', 'text' => 'Resolución de situaciones académicas especiales'],
                    ],
                ],
                [
                    'titulo' => 'Servicios de la Secretaría',
                    'items'  => [
                        ['icon' => 'fa-check', 'text' => 'Inscripciones y reinscripciones semestrales'],
                        ['icon' => 'fa-check', 'text' => 'Emisión de certificados y constancias académicas'],
                        ['icon' => 'fa-check', 'text' => 'Información sobre horarios y calendario académico'],
                        ['icon' => 'fa-check', 'text' => 'Orientación sobre trámites y procedimientos'],
                    ],
                ],
            ],
            'nota' => 'Horario de atención: Lunes a Viernes de 8:00 a 12:00 y de 14:30 a 18:30.',
            'nota_icon' => 'fa-clock',
        ],
    ];

    public function show(string $slug)
    {
        abort_unless(array_key_exists($slug, $this->secciones), 404);
        return view('infraestructura.detalle', [
            'seccion' => (object) $this->secciones[$slug],
            'slug'    => $slug,
        ]);
    }
}
