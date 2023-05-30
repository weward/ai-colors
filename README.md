# AI Translator

This an AI-powered color palette suggesstion app. Currently supports `OpenAI`.

---
### Tech Stack

- Laravel 10
- AI Services Supported:
    - OpenAI
    - 

---
### Configure ENV Vars

- Config parameters for OpenAI

```
AI_CONNECTION=openai
OPEN_AI_URL=https://api.openai.com/v1/completions
OPEN_AI_SECRET_KEY=
OPEN_AI_MODEL=text-davinci-003

```

---

## Sample #1
```json
{
    // Variations
    "count": "3",
    // Color theory type complementary, triadic, Analogous, etc
    "color_theory_type": "complementary",
    // Base color
    "base_color": "#FF5733",
    // Number of colors in the color palette
    "colors_count": "6"
}
```

Response

```json
{
    "id": "cmpl-7LnUZyubKID1eYTyR4q6G30uH0jBZ",
    "object": "text_completion",
    "created": 1685429491,
    "model": "text-davinci-003",
    "choices": [
        {
            "text": ":\r\n\r\n1. #FF5733, #FFA851, #FFD971, #B3FF33, #3FFF9F, #33D2FF\r\n2. #FF5733, #FFA851, #FFD971, #33FFB3, #33A2FF, #7F33FF\r\n3. #FF5733, #FFA851, #FFD971, #33FFB3, #9F33FF, #FF33A2",
            "index": 0,
            "logprobs": null,
            "finish_reason": "stop"
        }
    ],
    "usage": {
        "prompt_tokens": 38,
        "completion_tokens": 118,
        "total_tokens": 156
    }
}
```

---
### Flow
- Request goes through `routes/api.php` -> `->name('ask')`
- Request is passed into the `AIController`'s `index` method
- The `AIService` gets injected
- The `AIService` loads the current configured `ai` connection from the config file `config/ai.php`
- `OpenAI` is the default connection and it uses the OpenAIService as called in the `AIService`'s  `loadService()` method


.
---
# Contributing

Email: dev.weward@gmail.com