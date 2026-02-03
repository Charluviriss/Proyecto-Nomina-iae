-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2026 a las 14:17:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nominadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicional_conceptos`
--

CREATE TABLE `adicional_conceptos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nro_constante` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `etiqueta` varchar(255) NOT NULL,
  `tipo_dato` varchar(50) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicional_personals`
--

CREATE TABLE `adicional_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nro_constante` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `etiqueta` varchar(255) NOT NULL,
  `tipo_dato` varchar(50) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `codigo_banco` varchar(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `sucursal` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `gerente` varchar(100) DEFAULT NULL,
  `cuenta` varchar(50) DEFAULT NULL,
  `tipo_cuenta` enum('Corriente','Ahorro','Otra') NOT NULL DEFAULT 'Corriente',
  `texto_inicial_carta` text DEFAULT NULL,
  `texto_final_carta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baremos`
--

CREATE TABLE `baremos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo_dato` enum('Dias','Meses','Años','Otros') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_nominas`
--

CREATE TABLE `concepto_nominas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo_concepto` varchar(50) NOT NULL,
  `unidad` varchar(50) NOT NULL,
  `valor_por_defecto` decimal(15,2) NOT NULL DEFAULT 0.00,
  `imprime_detalles` tinyint(1) NOT NULL DEFAULT 0,
  `prorratea` tinyint(1) NOT NULL DEFAULT 0,
  `fijo` tinyint(1) NOT NULL DEFAULT 0,
  `usa_descripcion_alternativa` tinyint(1) NOT NULL DEFAULT 0,
  `modifica_descripcion` tinyint(1) NOT NULL DEFAULT 0,
  `bonificable` tinyint(1) NOT NULL DEFAULT 0,
  `hoja_tiempo` tinyint(1) NOT NULL DEFAULT 0,
  `muestra_valor_referencia` tinyint(1) NOT NULL DEFAULT 0,
  `muestra_monto_calculo` tinyint(1) NOT NULL DEFAULT 0,
  `formula` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipos_nomina` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tipos_nomina`)),
  `frecuencias` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`frecuencias`)),
  `situaciones` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`situaciones`)),
  `acumulados` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`acumulados`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constante_formulas`
--

CREATE TABLE `constante_formulas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `etiqueta` varchar(255) NOT NULL,
  `tipo_campo` varchar(50) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseno_archivo_textos`
--

CREATE TABLE `diseno_archivo_textos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `organismo` varchar(100) NOT NULL,
  `notas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseños_reporte`
--

CREATE TABLE `diseños_reporte` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ficha_Empleado` varchar(50) NOT NULL,
  `Nacionalidad` enum('Venezolano','Extranjero') DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `profesion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `situacion_laboral` enum('Nuevo','Activo','Suspendido','Vacaciones','Inactivo','Jubilado') DEFAULT 'Nuevo',
  `foto_empleado` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `prestaciones` enum('Fideicomiso','Fondo','Contabilidad') DEFAULT NULL,
  `tipo_cobro` enum('Efectivo','Cheque','Deposito Ahorro','Deposito Cta. Corriente','Deposito F.A.L.') DEFAULT NULL,
  `grupo_banco_id` bigint(20) UNSIGNED DEFAULT NULL,
  `numero_cuenta` varchar(30) DEFAULT NULL,
  `grupo_banco_auxiliar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `numero_cuenta_auxiliar` varchar(30) DEFAULT NULL,
  `tipo_contrato` enum('Fijo','Temporal','Contratado','Pasante') NOT NULL,
  `Salario` varchar(30) DEFAULT NULL,
  `tipo_nomina_id` bigint(20) UNSIGNED DEFAULT NULL,
  `presupuesto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `direccion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `departamento_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cargo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nro_serial` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `identificador_1` varchar(255) NOT NULL,
  `identificador_2` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `estado_departamento` varchar(255) NOT NULL,
  `zona_postal` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `representante` varchar(255) NOT NULL,
  `encargado_rrhh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_bancos`
--

CREATE TABLE `grupos_bancos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo_banco_grupo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `sucursal` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `gerente` varchar(100) DEFAULT NULL,
  `cuenta` varchar(50) DEFAULT NULL,
  `texto_inicial_carta` text DEFAULT NULL,
  `texto_final_carta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guarderias`
--

CREATE TABLE `guarderias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo_guarderia` varchar(50) NOT NULL,
  `sucursal_ubicacion` varchar(100) DEFAULT NULL,
  `rif` varchar(50) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `telefonos` varchar(100) DEFAULT NULL,
  `nro_registro` varchar(100) DEFAULT NULL,
  `monto_inscripcion_base` decimal(10,2) NOT NULL DEFAULT 0.00,
  `monto_mensual_base` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas`
--

CREATE TABLE `nominas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_nomina_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `estado` enum('Abierta','Cerrada','Anulada') NOT NULL DEFAULT 'Abierta',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina_detalles`
--

CREATE TABLE `nomina_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomina_id` bigint(20) UNSIGNED NOT NULL,
  `empleado_id` bigint(20) UNSIGNED NOT NULL,
  `sueldo_base_momento` decimal(12,2) NOT NULL,
  `total_asignaciones` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_deducciones` decimal(12,2) NOT NULL DEFAULT 0.00,
  `monto_neto` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_auxiliars`
--

CREATE TABLE `tabla_auxiliars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabulador_categorias`
--

CREATE TABLE `tabulador_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `salario` decimal(12,1) DEFAULT NULL,
  `bono_mes` decimal(12,1) DEFAULT NULL,
  `bono_dia` decimal(12,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasas_interes`
--

CREATE TABLE `tasas_interes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `año` year(4) NOT NULL,
  `mes` tinyint(3) UNSIGNED NOT NULL,
  `tasa` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_aumentos`
--

CREATE TABLE `tipos_aumentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_ausencia`
--

CREATE TABLE `tipos_ausencia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_liquidacion`
--

CREATE TABLE `tipos_liquidacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_prestamos`
--

CREATE TABLE `tipos_prestamos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acumulados`
--

CREATE TABLE `tipo_acumulados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_tipo` varchar(20) NOT NULL,
  `descripcion_acumulados` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_frecuencia_pagos`
--

CREATE TABLE `tipo_frecuencia_pagos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_frecuencia` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_nominas`
--

CREATE TABLE `tipo_nominas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_nomina` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_parentesco`
--

CREATE TABLE `tipo_parentesco` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adicional_conceptos`
--
ALTER TABLE `adicional_conceptos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adicional_conceptos_nro_constante_unique` (`nro_constante`);

--
-- Indices de la tabla `adicional_personals`
--
ALTER TABLE `adicional_personals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adicional_personals_nro_constante_unique` (`nro_constante`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bancos_codigo_banco_unique` (`codigo_banco`);

--
-- Indices de la tabla `baremos`
--
ALTER TABLE `baremos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `baremos_codigo_unique` (`codigo`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargos_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `concepto_nominas`
--
ALTER TABLE `concepto_nominas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `concepto_nominas_codigo_unique` (`codigo`);

--
-- Indices de la tabla `constante_formulas`
--
ALTER TABLE `constante_formulas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `constante_formulas_codigo_unique` (`codigo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departamentos_codigo_unique` (`codigo`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `direcciones_codigo_unique` (`codigo`);

--
-- Indices de la tabla `diseno_archivo_textos`
--
ALTER TABLE `diseno_archivo_textos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diseños_reporte`
--
ALTER TABLE `diseños_reporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empleados_ficha_empleado_unique` (`ficha_Empleado`),
  ADD UNIQUE KEY `empleados_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `empleados_email_unique` (`email`),
  ADD KEY `empleados_profesion_id_foreign` (`profesion_id`),
  ADD KEY `empleados_grupo_banco_id_foreign` (`grupo_banco_id`),
  ADD KEY `empleados_grupo_banco_auxiliar_id_foreign` (`grupo_banco_auxiliar_id`),
  ADD KEY `empleados_tipo_nomina_id_foreign` (`tipo_nomina_id`),
  ADD KEY `empleados_presupuesto_id_foreign` (`presupuesto_id`),
  ADD KEY `empleados_direccion_id_foreign` (`direccion_id`),
  ADD KEY `empleados_departamento_id_foreign` (`departamento_id`),
  ADD KEY `empleados_categoria_id_foreign` (`categoria_id`),
  ADD KEY `empleados_cargo_id_foreign` (`cargo_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grupos_bancos`
--
ALTER TABLE `grupos_bancos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupos_bancos_codigo_banco_grupo_unique` (`codigo_banco_grupo`);

--
-- Indices de la tabla `guarderias`
--
ALTER TABLE `guarderias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guarderias_codigo_guarderia_unique` (`codigo_guarderia`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nominas_tipo_nomina_id_foreign` (`tipo_nomina_id`);

--
-- Indices de la tabla `nomina_detalles`
--
ALTER TABLE `nomina_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomina_detalles_nomina_id_foreign` (`nomina_id`),
  ADD KEY `nomina_detalles_empleado_id_foreign` (`empleado_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profesiones_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tabla_auxiliars`
--
ALTER TABLE `tabla_auxiliars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tabla_auxiliars_codigo_unique` (`codigo`);

--
-- Indices de la tabla `tabulador_categorias`
--
ALTER TABLE `tabulador_categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tabulador_categorias_grupo_unique` (`grupo`);

--
-- Indices de la tabla `tasas_interes`
--
ALTER TABLE `tasas_interes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tasas_interes_año_mes_unique` (`año`,`mes`);

--
-- Indices de la tabla `tipos_aumentos`
--
ALTER TABLE `tipos_aumentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipos_aumentos_tipo_unique` (`tipo`);

--
-- Indices de la tabla `tipos_ausencia`
--
ALTER TABLE `tipos_ausencia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipos_ausencia_codigo_unique` (`codigo`);

--
-- Indices de la tabla `tipos_liquidacion`
--
ALTER TABLE `tipos_liquidacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_prestamos`
--
ALTER TABLE `tipos_prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_acumulados`
--
ALTER TABLE `tipo_acumulados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_acumulados_descripcion_tipo_unique` (`descripcion_tipo`),
  ADD UNIQUE KEY `tipo_acumulados_descripcion_acumulados_unique` (`descripcion_acumulados`);

--
-- Indices de la tabla `tipo_frecuencia_pagos`
--
ALTER TABLE `tipo_frecuencia_pagos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_frecuencia_pagos_descripcion_frecuencia_unique` (`descripcion_frecuencia`);

--
-- Indices de la tabla `tipo_nominas`
--
ALTER TABLE `tipo_nominas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_nominas_descripcion_nomina_unique` (`descripcion_nomina`);

--
-- Indices de la tabla `tipo_parentesco`
--
ALTER TABLE `tipo_parentesco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adicional_conceptos`
--
ALTER TABLE `adicional_conceptos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `adicional_personals`
--
ALTER TABLE `adicional_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `baremos`
--
ALTER TABLE `baremos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `concepto_nominas`
--
ALTER TABLE `concepto_nominas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `constante_formulas`
--
ALTER TABLE `constante_formulas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diseno_archivo_textos`
--
ALTER TABLE `diseno_archivo_textos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diseños_reporte`
--
ALTER TABLE `diseños_reporte`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos_bancos`
--
ALTER TABLE `grupos_bancos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guarderias`
--
ALTER TABLE `guarderias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nominas`
--
ALTER TABLE `nominas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nomina_detalles`
--
ALTER TABLE `nomina_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_auxiliars`
--
ALTER TABLE `tabla_auxiliars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabulador_categorias`
--
ALTER TABLE `tabulador_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tasas_interes`
--
ALTER TABLE `tasas_interes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_aumentos`
--
ALTER TABLE `tipos_aumentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_ausencia`
--
ALTER TABLE `tipos_ausencia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_liquidacion`
--
ALTER TABLE `tipos_liquidacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_prestamos`
--
ALTER TABLE `tipos_prestamos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_acumulados`
--
ALTER TABLE `tipo_acumulados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_frecuencia_pagos`
--
ALTER TABLE `tipo_frecuencia_pagos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_nominas`
--
ALTER TABLE `tipo_nominas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_parentesco`
--
ALTER TABLE `tipo_parentesco`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_direccion_id_foreign` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_grupo_banco_auxiliar_id_foreign` FOREIGN KEY (`grupo_banco_auxiliar_id`) REFERENCES `grupos_bancos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_grupo_banco_id_foreign` FOREIGN KEY (`grupo_banco_id`) REFERENCES `grupos_bancos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_presupuesto_id_foreign` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_profesion_id_foreign` FOREIGN KEY (`profesion_id`) REFERENCES `profesiones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_tipo_nomina_id_foreign` FOREIGN KEY (`tipo_nomina_id`) REFERENCES `tipo_nominas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD CONSTRAINT `nominas_tipo_nomina_id_foreign` FOREIGN KEY (`tipo_nomina_id`) REFERENCES `tipo_nominas` (`id`);

--
-- Filtros para la tabla `nomina_detalles`
--
ALTER TABLE `nomina_detalles`
  ADD CONSTRAINT `nomina_detalles_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `nomina_detalles_nomina_id_foreign` FOREIGN KEY (`nomina_id`) REFERENCES `nominas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
