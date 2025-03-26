CREATE TABLE familias (
    cod_familia INT AUTO_INCREMENT PRIMARY KEY,
    direccion VARCHAR(255) NOT NULL
);

CREATE TABLE sectores (
    id_sector INT AUTO_INCREMENT PRIMARY KEY,
    nombre_sector VARCHAR(255) NOT NULL
);

CREATE TABLE nacionalidad (
    id_nacionalidad INT AUTO_INCREMENT PRIMARY KEY,
    nom_nacionalidad VARCHAR(255) NOT NULL
);

CREATE TABLE pueblo_originario (
    id_pueblo_originario INT AUTO_INCREMENT PRIMARY KEY,
    nom_pueblo_originario VARCHAR(255) NOT NULL
);

CREATE TABLE previcion (
    id_previcion INT AUTO_INCREMENT PRIMARY KEY,
    nom_previcion VARCHAR(255) NOT NULL
);

CREATE TABLE pacientes (
    rut_paciente VARCHAR(15) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100) NOT NULL,
    sexo ENUM('Masculino', 'Femenino', 'Otro') NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    num_ficha VARCHAR(50) UNIQUE,
    estado ENUM('Inscrito', 'Trasladado', 'Fallecido') NOT NULL,
    id_sector INT,
    id_nacionalidad INT,
    id_pueblo_originario INT,
    id_previcion INT,
    cod_familia INT,
    FOREIGN KEY (id_sector) REFERENCES sectores(id_sector),
    FOREIGN KEY (id_nacionalidad) REFERENCES nacionalidad(id_nacionalidad),
    FOREIGN KEY (id_pueblo_originario) REFERENCES pueblo_originario(id_pueblo_originario),
    FOREIGN KEY (id_previcion) REFERENCES previcion(id_previcion),
    FOREIGN KEY (cod_familia) REFERENCES familias(cod_familia)
);

CREATE TABLE patologia (
    id_patologia INT AUTO_INCREMENT PRIMARY KEY,
    nombre_patologia VARCHAR(255) NOT NULL
);

CREATE TABLE paciente_patologia (
    id_pp INT AUTO_INCREMENT PRIMARY KEY,
    rut_paciente VARCHAR(15),
    id_patologia INT,
    FOREIGN KEY (rut_paciente) REFERENCES pacientes(rut_paciente),
    FOREIGN KEY (id_patologia) REFERENCES patologia(id_patologia)
);

CREATE TABLE archivos (
    id_archivo INT AUTO_INCREMENT PRIMARY KEY,
    tipo_archivo VARCHAR(100) NOT NULL,
    archivo VARCHAR(255) NOT NULL,
    rut_paciente VARCHAR(15),
    FOREIGN KEY (rut_paciente) REFERENCES pacientes(rut_paciente)
);

CREATE TABLE contacto (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    contacto VARCHAR(255) NOT NULL,
    rut_paciente VARCHAR(15),
    FOREIGN KEY (rut_paciente) REFERENCES pacientes(rut_paciente)
);