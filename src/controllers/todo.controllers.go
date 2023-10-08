package controllers

import (
	"fmt"
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/notblessy/go-ingnerd/src/config"
	"github.com/notblessy/go-ingnerd/src/models"
	"github.com/spf13/cast"
	"gorm.io/gorm"
)

var db *gorm.DB = config.ConnectDB()

// struct for request
type todoRequest struct {
	Name        string `json:"name"`
	Description string `json:"description"`
}

// struct for response
type todoResponse struct {
	todoRequest
	ID uint `json:"id"`
}

// create todo
func CreateTodo(context *gin.Context) {
	var todoRequest

	//	binding request body json to request body struct
	if err := context.ShouldBindJSON(&data); err != nil {
		context.JSON(http.statusBadRequest, gin.H{"error": err.Error()})
		return
	}

	//	matching todo modals struct
	todo := modal.Todo{}
	todo.Name = data.Name
	todo.Description = data.Description

	//quering to database
	result := db.Create(&todo)
	if result.Error != nil {
		context.JSON(http.StatusBadRequest, gin.H{
			"error": "Something went wrong",
		})
		return
	}

	//	matching result
	var response todoResponse
	response.ID = todo.ID
	response.Name = todo.Name
	response.Description = todo.Description

	//	creating http response
	context.JSON(http.StatusCreated, response)
}
