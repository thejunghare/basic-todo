package models

imoprt ()


type Todo struct {
	gorm.Model
	Name string
	Description string
}