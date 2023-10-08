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

var db * gorm.DB = config.ConnectDB()

// struct for request
type todoRequest struct {
	Name string `json:"name"`
	Description string `json:"description"`
}

// struct for response
type todoResponse struct{
	todoRequest
	ID uint `json:"id"`
}

// create todo