<?php
USE [bookstore];
GO

IF OBJECT_ID(N'dbo.tbladmin', N'U') IS NOT NULL  
   DROP TABLE [dbo].[tbladmin]; 
   
Else IF OBJECT_ID(N'dbo.tblaorder', N'U') IS NOT NULL  
   DROP TABLE [dbo].[tblaorder];   

Else IF OBJECT_ID(N'dbo.tblbooks', N'U') IS NOT NULL  
   DROP TABLE [dbo].[tblbooks];  
   
Else IF OBJECT_ID(N'dbo.tbluser', N'U') IS NOT NULL  
   DROP TABLE [dbo].[tbluser];  

Else IF OBJECT_ID(N'dbo.tbladmin', N'U') IS NOT NULL  
   CREATE TABLE [dbo].[tbladmin]; 
   
Else IF OBJECT_ID(N'dbo.tblaorder', N'U') IS NOT NULL  
   CREATE TABLE [dbo].[tblaorder];   

Else IF OBJECT_ID(N'dbo.tblbooks', N'U') IS NOT NULL  
   CREATE TABLE [dbo].[tblbooks];  
   
Else OBJECT_ID(N'dbo.tbluser', N'U') IS NOT NULL  
   CREATE TABLE [dbo].[tbluser];

GO
?>