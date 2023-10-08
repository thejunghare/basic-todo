package routes

import (
	"github.com/gin-gonic/gin"
	"github.com/notblessy/go-ingnerd/src/controllers"
)

func Routes(){
	route := gin.Default()

	route.POST("/todo", controllers.CreateTodo)
	route.GET("/todo", controllers.GetAllTodos)
	route.PUT("/todo/:idTodo", controllers.UpdateTodo)
	route.DELETE("/todo/:idTodo", controllers.DeleteTodo)
	
	route.Run()
}