package com.example.izyploy;

import java.util.Map;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HelloController {
    private static final Logger LOGGER = LoggerFactory.getLogger(HelloController.class);

    @GetMapping("/")
    public Map<String, String> root() {
        LOGGER.info("GET /");
        return Map.of("message", "Hello World", "runtime", "java");
    }

    @GetMapping("/health")
    public Map<String, String> health() {
        LOGGER.info("GET /health");
        return Map.of("status", "ok");
    }
}
