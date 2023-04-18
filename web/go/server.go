package main

import (
    "fmt"
    "log"
    "net/http"
)

func main() {

    http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        fmt.Fprintf(w, "Hello World")
    })

    log.Fatal(http.ListenAndServe("0.0.0.0:5000", nil))

}
