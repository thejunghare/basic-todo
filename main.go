package main

import "github.com/thejunghare/basic-todo-php/src/config"

var (
	db*gorm.DB = config.ConnectDB()
)

func main(){
	defer config.DisconnectDB(db)

	// run all routes
	routes.Routes()
}