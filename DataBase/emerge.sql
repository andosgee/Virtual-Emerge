-- Emerge Database, Table Creation Script
-- Created By Andrew Grant
-- Created On 2024-11-10

-- Create the Database
CREATE DATABASE IF NOT EXISTS emerge;
USE emerge;

-- Create the Tables

-- Admin Table
CREATE TABLE IF NOT EXISTS admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Organization VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

-- Event Table
CREATE TABLE IF NOT EXISTS event (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    EventName VARCHAR(100) NOT NULL,
    EventDate DATE NOT NULL,
    TourLink VARCHAR(200) NOT NULL,
    Publish BOOLEAN NOT NULL
)ENGINE=InnoDB;

-- Students Table
CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Pathway ENUM('Software', 'Networking', 'Information') NOT NULL,
    ProjectName VARCHAR(100) NOT NULL,
    Event_ID INT,
    FOREIGN KEY (Event_ID) REFERENCES event(event_id)
)ENGINE=InnoDB;

-- Assets Table
CREATE TABLE IF NOT EXISTS assets(
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    Directory VARCHAR(100) NOT NULL,
    Type ENUM('PDF', 'Image') NOT NULL,
    TableRelates ENUM('event', 'students') NOT NULL,
    TableRelatesID INT NOT NULL
)ENGINE=InnoDB;

-- Indexes for Performance
CREATE INDEX idx_event_id ON event(event_id);
CREATE INDEX idx_student_id ON students(student_id);
CREATE INDEX idx_asset_id ON assets(asset_id);
