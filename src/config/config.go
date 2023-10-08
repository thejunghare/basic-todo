package config

import (
	"fmt"
	"github.com/jinzhu/gorm"
	"github.com/joho/godotenv"
	"os"
)

func ConnectDB() *gorm.DB {
	// *load env details
	errorENV := godotenv.Load()
	if errorENV != nil {
		panic("Failed to load env file")
	}

	// *load details from .env
	dbUsername := os.Getenv("DB_USER")
	dbPassword := os.Getenv("DB_PASS")
	dbHostname := os.Getenv("DB_HOST")
	dbName := os.Getenv("DB_NAME")

	// *connnect to database
	dsn := fmt.Sprintf("%s:%s@tcp(%s:3306)/%s?charset=utf8&parseTime=true&loc=Local", dbUsername, dbPassword, dbHostname, dbName)
	db, errorDB := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	if errorDB != nil {
		panic("Failed to connect mysql database")
	}

	return db
}

// *disconnect to database
func DisconnectDB(db *gorm.DB) {
	dbSQL, err := db.DB()
	if err != nil {
		panic("Failed to kill connection from database")
	}
	dbSQL.Close()
}
