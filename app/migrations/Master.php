<?php

namespace App\Migrations;

class MasterMigration
{
	/**
     * Run the migration.
     * @return String A sql query
     */

	public function up()
	{
		return "-- phpMyAdmin SQL Dump
		-- version 4.9.5deb2
		-- https://www.phpmyadmin.net/
		--
		-- Host: localhost:3306
		-- Generation Time: Mar 19, 2021 at 10:04 AM
		-- Server version: 8.0.23-0ubuntu0.20.04.1
		-- PHP Version: 7.4.3
		
		SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
		SET AUTOCOMMIT = 0;
		START TRANSACTION;
		SET time_zone = \"+00:00\";
		
		
		/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
		/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
		/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
		/*!40101 SET NAMES utf8mb4 */;
		
		--
		-- Database: `marksite`
		--
		
		-- --------------------------------------------------------
		
		--
		-- Table structure for table `users`
		--
		
		CREATE TABLE `users` (
		  `id` int NOT NULL COMMENT 'ID of an user',
		  `email` text NOT NULL COMMENT 'User''s email',
		  `password` text NOT NULL COMMENT 'User''s password',
		  `sitename` text NOT NULL COMMENT 'The vanity URL',
		  `markdown` text NOT NULL COMMENT 'The content of the site',
		  `darkmode` tinyint(1) NOT NULL COMMENT 'Is dark mode enabled?',
		  `seo` json NOT NULL COMMENT 'SEO Data',
		  `css` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'User''s custom CSS',
		  `js` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'User''s custom JS',
		  `code` tinyint(1) NOT NULL COMMENT 'Is syntax highlighting enabled?'
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
		
		--
		-- Indexes for dumped tables
		--
		
		--
		-- Indexes for table `users`
		--
		ALTER TABLE `users`
		  ADD PRIMARY KEY (`id`);
		
		--
		-- AUTO_INCREMENT for dumped tables
		--
		
		--
		-- AUTO_INCREMENT for table `users`
		--
		ALTER TABLE `users`
		  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID of an user';
		COMMIT;
		
		/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
		/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
		/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
	}

	/**
     * Reverse the migration.
     * @return String A sql query
     */

	public function down()
	{
		return "DROP TABLE `users`";
	}
}