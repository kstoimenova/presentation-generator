-- DUMP CATEGORIES --
INSERT INTO Presentations_generator.categories (id, name) VALUES (1, "Other");
INSERT INTO Presentations_generator.categories (id, name) VALUES (2, "HTML");
INSERT INTO Presentations_generator.categories (id, name) VALUES (3, "PHP");
INSERT INTO Presentations_generator.categories (id, name) VALUES (4, "Java");
INSERT INTO Presentations_generator.categories (id, name) VALUES (5, "JavaScript");
INSERT INTO Presentations_generator.categories (id, name) VALUES (6, "CSS");
INSERT INTO Presentations_generator.categories (id, name) VALUES (7, "SQL");
INSERT INTO Presentations_generator.categories (id, name) VALUES (8, "C/C++");
INSERT INTO Presentations_generator.categories (id, name) VALUES (9, "C#");
INSERT INTO Presentations_generator.categories (id, name) VALUES (10, "DevOps");
INSERT INTO Presentations_generator.categories (id, name) VALUES (11, "JS Frameworks");

-- DUMP SLIDES_TYPES --
INSERT INTO Presentations_generator.slides_types (id, layout) VALUES (1, "withText");
INSERT INTO Presentations_generator.slides_types (id, layout) VALUES (2, "withList");
INSERT INTO Presentations_generator.slides_types (id, layout) VALUES (3, "withCodeblock");
INSERT INTO Presentations_generator.slides_types (id, layout) VALUES (4, "withPhoto");

-- DUMP PRESENTATIONS --
INSERT INTO Presentations_generator.presentations (name, category_id, path) VALUES ("Test HTML presentation", 2, "/uploads/");
INSERT INTO Presentations_generator.presentations (name, category_id, path) VALUES ("Test JavaScript presentation", 5, "/uploads/");

-- DUMP SLIDES --
INSERT INTO Presentations_generator.slides (presentation_id, heading, text_area, list_json, codeblock, photo, ordering, type_id) 
VALUES (1, 'Форми', NULL, NULL, "<form method='post' action='/add-course.php'> \n <label for='course-title'> Course Title </label> \n <input id='course-title' name='title'>.. \n <button disabled> Submit </button> \n </form>",
NULL, 1, 3);

INSERT INTO Presentations_generator.slides (presentation_id, heading, text_area, list_json, codeblock, photo, ordering, type_id) 
VALUES (1, 'Основни тагове', NULL, '["input - поле за въвеждане. Един от малкото самозатварящи тагове.", "label - етикет на дадено поле - кликнете върху него и то ще се активира.", "textarea - Текстово поле с много редове. НЕ Е самозатварящ се таг."]', NULL, NULL, 2, 2);

INSERT INTO Presentations_generator.slides (presentation_id, heading, text_area, list_json, codeblock, photo, ordering, type_id) 
VALUES (1, 'Други тагове', NULL, '["fieldset - елемент, групиращ релевантни части от формата", "legend - заглавие на parent fieldset-а си", "button - бутон - НЕ Е самозатварящ се. type = submit (default) reset button", "select - dropdown меню. Поддържа атрибут multiple", "option - опция от select (или datalist) - може да има атрибут selected", "datalist - Autocomplete стойности за даден input. Bad browser support :("]', NULL, NULL, 3, 2);

INSERT INTO Presentations_generator.slides (presentation_id, heading, text_area, list_json, codeblock, photo, ordering, type_id) 
VALUES (1, 'PHP - обработка на заявки', 'В PHP имаме глобални променливи $_GET и $_POST. Асоциативни масиви съдържащи данните, подадени от HTTP заявките. При GET заявките данните се виждат и в url-a като query-string.', NULL, NULL, NULL, 4, 1);
