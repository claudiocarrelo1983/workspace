

DELETE FROM `user` WHERE `username` in ('joana2022','carrelo1983','silvia1984');
INSERT INTO `user` (`guid`, `username`, `first_name`, `last_name`, `full_name`, `gender`, `title`, `path`, `image`, `dob`, `company_dob`, `company_code_parent`, `company_code_url`, `company_code`, `company`, `starting_date`, `payment_month_fee`, `payment_year_fee`, `role`, `level`, `sublevel`, `status`, `language`, `email`, `type`, `summary`, `description`, `address`, `postcode`, `location`, `country`, `nif`, `logo`, `website`, `facebook`, `pinterest`, `instagram`, `twitter`, `tiktok`, `linkedin`, `youtube`, `contact_number`, `code`, `terms_and_conditions`, `gdpr`, `privacy`, `newsletter`, `auth_key`, `password_hash`, `password_reset_token`, `active`, `created_at`, `updated_at`, `created_date`, `verification_token`) VALUES ('8A3C000C-A404-4870-BCD9-19167FC89254', 'carrelo1983', 'Claudio', 'Carrelo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '091229030121', '091229030121', 'FTX Team', NULL, NULL, NULL, NULL, 'admin', NULL, 10, NULL, 'maurosoares@hotmail.co.uk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 'kSfzrCz9_0B8PkH8cTO9NeU5qg5aXpDV', '$2y$13$vdnqqvl7CsJbz//mXgV.Fui7Rq4Jsxz0tO2nk5sGzT9aXpzRDdQdm', NULL, 1, 1686298379, 1686298379, '2023-06-09 09:20:58', 'qbEKC3EF4822yHEBMsS_dMfONEDE_XG__1686298379');

DELETE FROM `team`;
INSERT INTO `team` (`company`, `username`, `page_code_title`, `page_code_text`, `full_name`, `path`, `image`, `location`, `title`, `text`, `title_pt`, `text_pt`, `title_en`, `text_en`, `website`, `facebook`, `pinterest`, `instagram`, `twitter`, `tiktok`, `linkedin`, `youtube`, `contact_number`, `color`, `active`, `created_date`) VALUES ('myspecialgym', 'joana2022', 'team_title_1', 'team_text_1', 'Joana Fernandes', '/images/team/', 'joana_fernandes.jpg', 'Seixal', 'Personal Training', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan', 'Personal Trainer', 'Chamo-me Joana, sou licenciada em Educação Física e Desporto , estando atualmente no 1.º ano do Mestrado em Saúde e Bem-estar.\\r\\n\\r\\nPercebendo da dificuldade de algumas pessoas aderirem à atividade física, e no sentido de criar um programa de treino que fosse ao encontro das necessidades individuias de cada pessoa, criei a Outlier. A Outlier representa a minha própria metodologia de treino, com o objetivo de que todos encontrem nela, motivação para um estilo de vida saudável.', 'Personal Trainer', 'My name is Joana, I have a degree in Physical Education and Sports, and I am currently in the 1st year of the Master in Health and Wellbeing.\\r\\n\\r\\nRealizing the difficulty of some people to adhere to physical activity, and in order to create a training program that would meet the individual needs of each person, I created Outlier. Outlier represents my own training methodology, with the aim that everyone finds themselves in it, motivated towards a healthy lifestyle.', 'https://treinos-outlier.my.canva.site/', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '96726377', '#4e71b0', 1, '2023-06-15 17:51:36');


DELETE FROM `blogs_category`;
INSERT INTO `blogs_category` (`tag_parent_id`, `tag`, `page_code`, `description`, `text_pt`, `text_en`, `active`, `created_date`) VALUES
('', 'training', 'blog_category_1', 'Training', 'Treino', 'Training', 1, '2023-01-28 20:16:09'),
('training', 'bodybuilding', 'blog_category_2', 'BodyBuilding', 'Musculação', 'Bodybuilding', 1, '2023-01-28 20:15:34'),
('nutrition', 'diet', 'blog_category_3', 'Diets', 'Dietas', 'Diets', 1, '2023-01-28 20:23:30'),
('nutrition', 'supplement', 'blog_category_4', 'Supplement', 'Suplemento', 'Supplement', 1, '2023-01-28 20:24:17'),
('', 'nutrition', 'blog_category_5', 'Nutrition', 'Nutrição', 'Nutrition', 1, '2023-01-28 19:08:48'),
('others', 'wellbeing', 'blog_category_7', 'Lifestyle & Wellbeing', 'Estilo de vida / Bem-estar', 'Lifestyle & Wellbeing', 1, '2023-01-28 20:26:40'),
('training', 'cardio', 'blog_category_8', 'Cardio', 'Cardio', 'Cardio', 1, '2023-01-28 20:15:35'),
('training', 'strengh', 'blog_category_9', 'Strengh', 'Força', 'Strengh ', 1, '2023-01-28 20:15:36'),
('training', 'flexibility', 'blog_category_10', 'Flexibility', 'Flexibilidade', 'Flexibility', 1, '2023-01-28 20:15:38'),
('training', 'speed', 'blog_category_11', 'Speed', 'Speed', 'Speed', 1, '2023-01-28 20:15:39'),
('training', 'martial_arts', 'blog_category_12', 'Martial Arts', 'Artes Marciais', 'Martial Arts', 1, '2023-01-28 20:15:41'),
('', 'others', 'blog_category_13', 'Others', 'Outros', 'Others', 1, '2023-01-28 19:26:32'),
('training', 'exercises', 'blog_category_14', 'Exercises', 'Exercicios', 'Exercises', 1, '2023-01-28 20:19:20'),
('training', 'functional', 'blog_category_19', 'Funtional Exercisers', 'Exercícios  Funcionais', 'Funtional Exercisers', 1, '2023-01-28 20:20:09'),
('training', 'body_mind', 'blog_category_20', 'Body & Mind', 'Corpo e Mente', 'Body & Mind', 1, '2023-01-28 20:20:52'),
('training', 'sports', 'blog_category_21', 'Sports', 'Desportos', 'Sports', 1, '2023-01-28 20:22:23'),
('nutrition', 'losing_weight', 'blog_category_22', 'Losing Weight', 'Perca de Peso', 'Losing Weight', 1, '2023-01-28 20:24:56'),
('nutrition', 'gain_weight', 'blog_category_23', 'Gaining Weight', 'Ganho de Peso', 'Gaining Weight', 1, '2023-01-28 20:25:50'),
('others', 'tips', 'blog_category_24', 'Tips', 'Dicas', 'Tips', 1, '2023-01-28 20:28:05'),
('others', 'prevention', 'blog_category_25', 'Prevention', 'Prevenção', 'Prevention', 1, '2023-01-28 20:28:42');

DELETE FROM `recipes_category`;
INSERT INTO `recipes_category` (`recipes_parent_id`, `page_code`, `recipe_cat_code`, `description`, `recipe_pt`, `recipe_en`, `active`, `created_date`) VALUES
('', 'recipes_category_1', 'meat', 'Meat', 'Carne', 'Meat', NULL, '2023-01-30 20:55:41'),
('', 'recipes_category_2', 'fish', 'Fish', 'Peixe', 'Fish', NULL, '2023-01-30 20:57:25'),
('', 'recipes_category_3', 'desert', 'Desert', 'Sobremesa', 'Desert', NULL, '2023-01-30 20:58:11'),
('', 'recipes_category_4', 'pasta', 'Pasta', 'Massas', 'Pastas', NULL, '2023-01-30 20:59:19'),
('', 'recipes_category_5', 'rice', 'Rice', 'Arroz', 'Rice', NULL, '2023-01-30 20:59:37'),
('', 'recipes_category_6', 'cakes', 'Cakes', 'Bolos', 'Cakes', NULL, '2023-01-30 21:00:02'),
('', 'recipes_category_7', 'snacks', 'Snacks', 'Snacks', 'Snacks', NULL, '2023-01-30 21:00:23'),
('', 'recipes_category_8', 'soup', 'Soup', 'Sopas', 'Soups', NULL, '2023-01-30 21:00:53'),
('', 'recipes_category_9', 'salads', 'Salads', 'Saladas', 'Salads', NULL, '2023-01-30 21:01:25'),
('', 'recipes_category_10', 'drinks', 'Drinks', 'Bebidas', 'Drinks', NULL, '2023-01-30 21:01:52');

DELETE FROM `translations` 
 WHERE page nOT IN (
    'recipes_text', 
    'subjects_text',
    'faqs_text',
    'pricing_specs_text',
    'blogs_text', 
    'blogs_category_text',
    'recipes_category_text',
    'team_text',
    'texts_text'
);

DELETE FROM `countries`;
INSERT INTO `countries` (`country_code`, `small_title`, `full_title`, `img`, `active`, `created_date`) VALUES ('en', 'EN', 'English', 'e', 0, '2022-12-28 17:36:33');
INSERT INTO `countries` (`country_code`, `small_title`, `full_title`, `img`, `active`, `created_date`) VALUES ('pt', 'PT', 'Portuguese', 'a', 0, '2022-12-28 17:37:25');

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'cpanel_big'  ,'Painel de Controlo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'cpanel_small'  ,'Cpanel',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'training_big'  ,'Meu Treino',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'training_small'  ,'Treino',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'login'  ,'Login',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'register'  ,'Registro',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','topmenu', 'recover_password'  ,'Recupere a Password',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_block_title_1'  ,'Login no seu painel de controlo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_block_text_1'  ,'Faça Login com suas credenciais na área de registo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_label_username_2'  ,'Username',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_label_password_2'  ,'Password',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_block_remember_me_1'  ,'Lembrar ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_block_forgot_password_2 '  ,'Esqueceu a Password?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_block_verification_email_2 '  ,'Precisa de um novo e-mail de verificação?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_block_resend_2 '  ,'Reenviar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','login', 'login_button_2'  ,'Login',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_home'  ,'Porque MySpecialGym?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_home_calendar'  ,'Porque Special Calendar?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_calculators'  ,'Calculadoras',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_calculators_bmi'  ,'IMC',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_calculators_calories'  ,'Calorias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_about_us'  ,'Sobre nos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_calculators_bmr'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_calculators_rma'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_calculators_pace'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_blog'  ,'Blog',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_features'  ,'Características',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_services'  ,'Serviços',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_pricing'  ,'Preços',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_recipes'  ,'Receitas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_contacts'  ,'Contactos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_coockies'  ,'Coockies',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_faqs'  ,'Faq´s',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_gdpr'  ,'RGPD',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_privacy'  ,'Politica de Privacidade',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_sitemap'  ,'Mapa do Site',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_terms'  ,'Termos e Condições',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_error'  ,'404',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','banner ', 'menu_text'  ,'Soluções personalizadas para Health Coaching e Personal Trainers',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','banner ', 'menu_text_calendar'  ,'Soluções personalizadas para Health Coaching e Personal Trainers',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','banner ', 'menu_schedule_calendar'  ,'CRM de agendamento de consultas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','banner ', 'breadcrumb_menu'  ,'Menu',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','banner', 'breadcrumb_start_free_trial'  ,'Free Trial de 30 dias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','banner', 'breadcrumb_compare_prices'  ,'Compare os Planos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_1'  ,'Software de treinamento personalizado para o mercado fitness.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_1'  ,'Uma plataforma fácil de usar  que permite que você assuma o controle de suas atividades diárias, focando mais em seus clientes e economizando tempo em tarefas administrativas.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_button_1'  ,'Registro',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_2_1'  ,'Organize a sua equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_2_2_1'  ,'Treino',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_2_2_2'  ,'Nutrição',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_2_2_3'  ,'Agendamento',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_2_3'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_2'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','', ''  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_3_1'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_3_1'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','', ''  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_3_2'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_3_2'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','', ''  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_3_3'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_3_3'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_4_download_it'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_4_mobile_app'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_4_app'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_4_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_4_read_more'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_5_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_5_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_5_button'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_6_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_6_title_1'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_6_title_2'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_6_title_3'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_6_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_title_secure'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_subtitle_secure'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_title_easy'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_subtitle_easy'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_title_bulk_email'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_subtitle_bulk_email'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_title_customizable'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_subtitle_customizable'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_read_more'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_control_panel'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_text'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_7_get_started'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_8_features'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_8_make_it_better'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_8_boost'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_8_countries'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_9_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_9_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_10_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_10_subtitle_1'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_10_subtitle_2'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_11_blog_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_11_blog_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_metric'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_imperial'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_gender'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_age'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_weight'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_height'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_activity'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_bmi_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_bmi_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_bmi_text'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_calories_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_calories_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_calories_text'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_bmi_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_bmi_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_bmi_text'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_rmr_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_rmr_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_rmr_text'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_pace_title'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_pace_subtitle'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','calculators', 'menu_calculators_pace_text'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','about', 'about_block_title_4_joana_fernandes'  ,'Personal Trainer',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','about', 'about_block_description_4_joana_fernandes'  ,'Responsável por educar os clientes e fazer cumprir as políticas relativas ao uso seguro e adequado de equipamentos.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','about', 'about_block_title_4_claudio_carrelo'  ,'CEO',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','about', 'about_block_description_4_claudio_carrelo'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','about', 'about_block_title_4_nelson_santos'  ,'Marketing',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','about', 'about_block_description_4_nelson_santos'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_1_title'  ,'Blogs',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_1_text'  ,'Encontre tudo sobre fitness, nutrição e estilo de vida, dicas, truques e muito mais...',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_categories'  ,'Categorias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_search'  ,'Pesquisar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_popular'  ,'Popular',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_recent'  ,'Recente',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_block_all'  ,'Todos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_read_more'  ,'Ler Mais',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_by'  ,'De',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_share'  ,'Partilhe o Post',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_leave_comment'  ,'Comente',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_comment'  ,'Comente',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_comments'  ,'Comentários',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_view_more'  ,'Ver Respostas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_full_name'  ,'Nome Completo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_reply'  ,'Responde',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','blog', 'blog_save'  ,'Guardar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_1_title'  ,'Receitas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_1_text'  ,'As melhores dicas de culinária para que consiga fazer as melhores receitas no conforto da tua casa.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_search       '  ,'Pesquisar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_categories'  ,'Categorias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_all            '  ,'Todas as Receitas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_food_ingredients'  ,'Ingredientes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_food_preparation'  ,'Preparação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_food_name'  ,'Nome',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_food_measure'  ,'Medida',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_food_calories'  ,'Calorias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_steps '  ,'Passo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_nutricional_title'  ,'Valor Nutricional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_nutricional_fact'  ,'Valores',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_quantity'  ,'Quantidades',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_carbs'  ,'Hidratos de Carbono',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_fat'  ,'Gordura',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_protein'  ,'Proteina',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_total'  ,'Total',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_dose'  ,'Dose',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_related'  ,'Receitas Relacionadas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_popular'  ,'Popular',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipes_block_recent'  ,'Recente',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','recipes', 'recipe_read_more'  ,'Ler Mais',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_1_title'  ,'Escolha o seu  plano.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_1_title_1'  ,'Basic',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_1_title_2'  ,'Standard',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_1_title_3'  ,'Professional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_1_title_4'  ,'Enterprise',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_1_text_1'  ,'Todos os pacotes incluem uma Área de Cliente e um conjunto de ferramentas úteis.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_2_strategy'  ,'E',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_2_planning'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_2_build'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_2_our_work'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_2_currency'  ,'Moeda',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_3_basic'  ,'Basic',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_3_standard'  ,'Standard',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_3_professional'  ,'Professional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_3_enterprise'  ,'Enterprise',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_3_start_now'  ,'Comprar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_4_title'  ,'Why choose My Special Gym?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_4_text'  ,'Existem muitos motivos com uma conta personalizada, segurança, bons recursos para melhorar o  seu metodo de trabalho, possibilidade de enviar e-mails em massa com a possibilidade d  apenas utilizar o  que precisa e crescer quando estiver pronto. Não há anúncios que distraem em sua caixa de correio, nenhum conteúdo não solicitado e nenhuma preocupação com as informações que você pode estar compartilhando involuntariamente com os anunciantes. Sua personalização é única, certifique-se de que seus clientes também sejam. Cause uma impressão profissional e duradoura.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_3_contact_us                                                  '  ,'Contate-nos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_block_2_free'  ,'Free Trial',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','pricing', 'pricing_per_block_per_month '  ,'Por mês',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_block_title_1'  ,'Contate-nos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_block_text_1'  ,'Para assistência técnica ou informações comerciais, fale com a equipa de suporte.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_block_2_contact_us'  ,'Contate-nos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_block_2_text'  ,'Sinta-se à vontade para pedir detalhes, não economize perguntas!',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_label_choose_subject'  ,'Escolha o assunto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_label_full_name'  ,'Nome Completo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_label_email'  ,'Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_label_subject'  ,'Assunto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_label_message'  ,'Mensagem',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_label_send_message'  ,'Enviar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_block_3_text_faqs'  ,'Para mais duvidas clique aqui.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','contacts', 'contacts_block_3_button_faqs'  ,'Faq´s',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','subfooter', 'subfooter_home_title'  ,'My Special Gym ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','subfooter', 'subfooter_home_subtitle'  ,'Realize mais com o seu software de treinamento  personalizado.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_label'  ,'Entre em contato',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_contact_info'  ,'INFORMAÇÕES DE CONTATO',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_subcategory_contact_info_email'  ,'EMAIL',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_subcategory_contact_info_emai_value'  ,'info@myspecialgym.com',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_subcategory_contact_info_working_days'  ,'DIAS/HORAS DE TRABALHO',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_subcategory_contact_info_schedule'  ,'Seg - Sex / 9:00AM - 8:00PM',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_menu'  ,'MENU',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links'  ,'LINKS ÚTEIS',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links_sitemap'  ,'Mapa do site',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links_faqs'  ,'Perguntas Frequentes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links_privacy_policy'  ,'Política de Privacidade',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links_coockies'  ,'Cookies',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links_gdpr'  ,'RGPD',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_usefull_links_terms'  ,'Termos e Condições',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt', 'footer', 'footer_category_usefull_affiliate_program' ,'Junte-se ao Nosso Programa de Afiliados',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_subscribe'  ,'SUBSCREVA A NEWSLETTER',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_subscribe_text'  ,'Obtenha todas as informações, vendas e ofertas mais recentes. subscreva-se a newsletter:',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_subscribe_placeholder'  ,'Email ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_category_subscribe_button'  ,'Subscreva',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer', 'footer_copywrite'  ,'© Copyright 2021. Todos os direitos reservados.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','faqs', 'faqs_title'  ,'Perguntas Frequentes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','faqs', 'faqs_text'  ,'Espero que consiga a resposta para à sua pergunta aqui.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_title'  ,'Mapa do site',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_landing_pages'  ,'Páginas de destino',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_text'  ,'O mapa do site são  informações sobre as páginas, vídeos e outros arquivos do seu site e as relações entre eles.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_menu'  ,'Porque MySpecialGym?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_blog_categories'  ,'Categorias de blog',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_login_pages'  ,'Páginas de login',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','sitemap', 'sitemap_other_pages'  ,'Outras Páginas ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'cpanel_big' ,'Control Panel',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'cpanel_small' ,'Cpanel',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'training_big' ,'My Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'training_small' ,'Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'login' ,'Login',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'register' ,'Register',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'topmenu', 'recover_password' ,'Recover Password',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_block_title_1' ,'Log in to control panel',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_block_text_1' ,'Log in with your credentials in the registration area',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_label_username_2' ,'Username',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_label_password_2' ,'Password',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_block_remember_me_1' ,'Remember Me',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_block_forgot_password_2 ' ,'Forgot Password?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_block_verification_email_2 ' ,'Need new verification email?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_block_resend_2 ' ,'Resend.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'login', 'login_button_2' ,'Login',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_home' ,'Why MySpecialGym?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_home_calendar' ,'Why Special Calendar?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators' ,'Calculators',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators_bmi' ,'BMI',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators_calories' ,'Calories',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_about_us' ,'About Us',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators_bmr' ,'BMR',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators_rma' ,'RMA',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators_pace' ,'Pace Cakculator',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_blog' ,'Blog',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_features' ,'What we do?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_services' ,'What we do?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_pricing' ,'Pricing',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_recipes' ,'Recipes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_contacts' ,'Contact Us',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_coockies' ,'Coockies',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_faqs' ,'Faq´s',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_gdpr' ,'GDPR',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_privacy' ,'Privacy Policy',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_sitemap' ,'Sitemap',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_terms' ,'Terms & Conditions',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_error' ,'404',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'banner ', 'menu_text' ,'Customized Solutions for Health Coaching & Personal Trainers',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'banner ', 'menu_text_calendar' ,'Appointment Scheduling CRM',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'banner ', 'menu_schedule_calendar' ,'Appointment Scheduling CRM',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'banner ', 'breadcrumb_menu' ,'Menu',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'banner', 'breadcrumb_start_free_trial' ,'Start Your 30-day Trial',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'banner', 'breadcrumb_compare_prices' ,'Compare Plans',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_1' ,'Custom training software tailored for the fitness.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_1' ,'An easy-to-use platform allows you to take control of your day-to-day activities, focusing more on your clients while saving time on administrative tasks.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_button_1' ,'Sign up',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_2_1' ,'Organizing you team',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_2_2_1' ,'Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_2_2_2' ,'Nutrition',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_2_2_3' ,'Schedulling',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_2_3' ,'will be a lot easier',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_2' ,'Workout management solution, shedduling, organizing system, planning tool, and CRM. Saving you both time and money.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', '', '' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_3_1' ,'Our Method',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_3_1' ,'We aim to help all fitness professionals deal with issues that are time demanding and with that help him focus on what really matters, make you a better trainer.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', '', '' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_3_2' ,'Organize Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_3_2' ,'A solution made to help save time organizing the student training, where you can set a training and distribute to a choosen group or individual.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', '', '' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_3_3' ,'Set Schedule',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_3_3' ,'Create schedules for each class with the possibility of adding a limited number of students and with a time window for the student to subscribe or cancel when needed.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_4_download_it' ,'DOWNLOAD IT NOW',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_4_mobile_app' ,'Mobile App',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_4_app' ,'App',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_4_subtitle' ,'This is the best that you will ever need!',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_4_read_more' ,'Read More',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_5_title' ,'App available for Android & App Store.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_5_subtitle' ,'Well structure app.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_5_button' ,'Download Now',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_6_title' ,'My Special Gym will help you',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_6_title_1' ,'Setup Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_6_title_2' ,'Save Time',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_6_title_3' ,'Organize Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_6_subtitle' ,'Make your workout team better by using the best tool on the market.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_title_secure' ,'Secure',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_subtitle_secure' ,'The site has a secure structure and will definetelly give your clients confidence that you need.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_title_easy' ,'Easy to use',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_subtitle_easy' ,'The main goal of this solution is make life easier, so we created a tool as intuitive as possible.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_title_bulk_email' ,'Bulk Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_subtitle_bulk_email' ,'Send email to all the group at the same time with a list of placeholders.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_title_customizable' ,'Customizable',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_subtitle_customizable' ,'Ability to create a custom page for your team with there own colors, logo and links to social media.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_read_more' ,'Read More',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_control_panel' ,'Control Panel',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_text' ,'Manage and Control your training group on the admin panel, where you can set all exercises, set the group training & classes, set meals, write into the blog, control all the evolution every member and much much more...',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_7_get_started' ,'Get Started Now',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_8_features' ,'Features',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_8_make_it_better' ,'Make it better',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_8_boost' ,'Boost your business',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_8_countries' ,'Countries',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_9_title' ,'Some of our Workout Management Groups',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_9_subtitle' ,'A few examples of companies that decided to trust our fitness management solution',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_10_title' ,'Our Groups',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_10_subtitle_1' ,'A few examples of companies that decided to trust our fitness management solution',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_10_subtitle_2' ,'We are happy for all the positive feeback that we got from our customers and we will continue improving so we get more and more happy clients.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_11_blog_title' ,'Blog',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_11_blog_subtitle' ,'A few examples of companies that decided to trust our fitness management solution',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_metric' ,'Metric',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_imperial' ,'Imperial',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_gender' ,'Gender',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_age' ,'Age',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_weight' ,'Weight',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_height' ,'Height',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_activity' ,'Activity',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_bmi_title' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_bmi_subtitle' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_bmi_text' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_calories_title' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_calories_subtitle' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_calories_text' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_bmi_title' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_bmi_subtitle' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_bmi_text' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_rmr_title' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_rmr_subtitle' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_rmr_text' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_pace_title' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_pace_subtitle' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'calculators', 'menu_calculators_pace_text' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'about', 'about_block_title_4_joana_fernandes' ,'Personal Trainer',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'about', 'about_block_description_4_joana_fernandes' ,'Responsible for educating clients and enforcing policies regarding safe and proper use of equipment.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'about', 'about_block_title_4_claudio_carrelo' ,'CEO',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'about', 'about_block_description_4_claudio_carrelo' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'about', 'about_block_title_4_nelson_santos' ,'Marketing',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'about', 'about_block_description_4_nelson_santos' ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_1_title' ,'Blogs',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_1_text' ,'Find everything about fitness, nutrition and lifestyle, tips, tricks and much more....',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_categories' ,'Categories',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_search' ,'Search',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_popular' ,'Popular',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_recent' ,'Recent',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_block_all' ,'All Blogs',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_read_more' ,'Read More',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_by' ,'By',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_share' ,'Share this Post',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_leave_comment' ,'Leave  Comment',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_comment' ,'Comment',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_comments' ,'Comments',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_view_more' ,'View Replys',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_full_name' ,'Full Name',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_reply' ,'Reply',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'blog', 'blog_save' ,'Save Time',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_1_title' ,'Recipes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_1_text' ,'The best cooking tips so you can make the best recipes in the comfort of your home.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_search       ' ,'Search',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_categories' ,'Categories',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_all            ' ,'All Recipes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_food_ingredients' ,'Ingredients',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_food_preparation' ,'Preparation',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_food_name' ,'Name',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_food_measure' ,'Measure',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_food_calories' ,'Calories',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_steps ' ,'Step',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_nutricional_title' ,'Nutricional Values',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_nutricional_fact' ,'Values',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_quantity' ,'Quantity',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_carbs' ,'Carbs',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_fat' ,'Fat',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_protein' ,'Protein',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_total' ,'Total',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_dose' ,'Dose',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_related' ,'Related Recipes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_popular' ,'Popular',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_recent' ,'Recent',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipe_read_more' ,'Read More',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_1_title' ,'Choose your plan.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_1_title_1' ,'Basic',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_1_title_2' ,'Standard',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_1_title_3' ,'Professional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_1_title_4' ,'Enterprise',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_1_text_1' ,'All packages include a Client Area and a set of useful tools.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_2_strategy' ,'Strategy',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_2_planning' ,'Planning',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_2_build' ,'Build',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_2_our_work' ,'Our Work',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_2_currency' ,'Currency',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_3_basic' ,'Basic',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_3_standard' ,'Standard',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_3_professional' ,'Professional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_3_enterprise' ,'Enterprise',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_3_start_now' ,'Buy',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_4_title' ,'Why choose My Special Gym?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_4_text' ,'There are lots of reasons - you get an access to an customize account, more security, better features, possibilty of sending buld emails plus you only pay for what you need so you can grow when you’re ready. There are no distracting adverts in your mailbox, no unsolicited content and no worries about the information you may unwittingly be sharing with advertisers. Your customization is unique, make sure your clients are too. Make a professional and lasting impression.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_3_contact_us                                                  ' ,'Contact Us',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_block_2_free' ,'Free Trial',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'pricing', 'pricing_per_block_per_month ' ,'Per Month',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_block_title_1' ,'Contact Us',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_block_text_1' ,'For technical assistance or commercial information, speak to the support team.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_block_2_contact_us' ,'Contact Us',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_block_2_text' ,'Feel free to ask for details, don´t save any questions!',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_label_choose_subject' ,'Choose Subject',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_label_full_name' ,'Full Name',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_label_email' ,'Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_label_subject' ,'Subject',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_label_message' ,'Message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_label_send_message' ,'Send Message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_block_3_text_faqs' ,'You can find some answers on Here',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'contacts', 'contacts_block_3_button_faqs' ,'Faq´s',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'subfooter', 'subfooter_home_title' ,'My Special Gym ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'subfooter', 'subfooter_home_subtitle' ,'Accomplish more with your custom  personal training software. ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_label' ,'Get in touch',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_contact_info' ,'CONTACT INFO',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_subcategory_contact_info_email' ,'EMAIL',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_subcategory_contact_info_emai_value' ,'info@myspecialgym.com',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_subcategory_contact_info_working_days' ,'WORKING DAYS/HOURS',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_subcategory_contact_info_schedule' ,'Mon - Fri / 9:00AM - 8:00PM',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_menu' ,'MENU',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links' ,'USEFUL LINKS',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links_sitemap' ,'Sitemap',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links_faqs' ,'Faq´s',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links_privacy_policy' ,'Privacy Policy',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links_coockies' ,'Cookies',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links_gdpr' ,'GDPR',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_links_terms' ,'Terms & Conditions',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_usefull_affiliate_program' ,'Join Our Affiliate Program',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_subscribe' ,'SUBSCRIBE NEWSLETTER',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_subscribe_text' ,'Get all the latest information, sales and offers. Sign up for newsletter:',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_subscribe_placeholder' ,'Email Address',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_category_subscribe_button' ,'Subscribe',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'footer', 'footer_copywrite' ,'© Copyright 2021. All Rights Reserved.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'faqs', 'faqs_title' ,'Faq´s',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'faqs', 'faqs_text' ,'Hope you get the answer to your question here.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_title' ,'Sitemap',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_landing_pages' ,'Landing Pages',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_text' ,'A sitemap is where the  information about the pages, videos, and other files on your site and the relationships between them.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_menu' ,'Why MySpecialGym?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_blog_categories' ,'Blog Categories',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_login_pages' ,'Login Pages',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'sitemap', 'sitemap_other_pages' ,'Other Pages',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_title_1', 'Registe-se', 1, '2023-07-12 10:13:31');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_text_1', 'Comece o seu trial grátis', 1, '2023-07-12 10:12:58');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_title_1', 'Sign Up', 1, '2023-07-12 10:11:39');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_text_1', 'Start your free trial', 1, '2023-07-12 10:11:03');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_register', 'Registro', 1, '2023-07-12 10:13:31');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_register', 'Sign Up', 1, '2023-07-12 10:13:31');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_title', 'Title', 1, '2023-07-12 10:13:31');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_title', 'Titulo', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_first_name', 'First Name', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_first_name', 'Primeiro Nome', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_last_name', 'Surname', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_last_name', 'Apelido', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_role', 'Job Title', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_role', 'Posição', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_company', 'Company Name', 1, '2023-07-12 10:28:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_company', 'Nome da Empresa', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_contact_number', 'Contact Number', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_contact_number', 'Contacto Movel', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_email', 'Email', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_email', 'Email', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_address', 'Address', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_address', 'Morada', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_address_1', 'Address 1', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_address_1', 'Morada 1', 1, '2023-07-12 10:37:08');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_address_2', 'Address 2', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_address_2', 'Morada 2', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_city', 'City', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_city', 'Cidade', 1, '2023-07-12 10:30:56');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_postcode', 'Postcode', 1, '2023-07-12 10:42:16');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_postcode', 'Codigo Postal', 1, '2023-07-12 10:42:16');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_location', 'Location', 1, '2023-07-12 10:42:16');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_location', 'Localização', 1, '2023-07-12 11:07:41');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_country', 'Country', 1, '2023-07-12 10:42:16');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_country', 'País', 1, '2023-07-12 10:42:16');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_country_select', 'Select Country', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_country_select', 'Selecione o Pais', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_login', 'Login Details', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_login', 'Detalhes de Login', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_username', 'Username', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_username', 'Username', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_password', 'Password', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_password', 'Password', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_validation_newsletter', 'Subscribe Newsletter', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_validation_newsletter', 'Subrescreva a Newsletter', 1, '2023-07-12 11:23:20');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_validation_terms', 'Accept Terms & Conditions', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_validation_terms', 'Aceitar os Termos & Condições', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_validation_privacy', 'Accept Privacy Policy', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_validation_privacy', 'Aceitar a Politica de Privacidade', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_privacy_link', 'privacy policy', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_privacy_link', 'politica de privacidade', 1, '2023-07-12 11:09:28');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'signup', 'signup_block_register', 'Submit', 1, '2023-07-12 11:28:32');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'signup', 'signup_block_register', 'Submeter', 1, '2023-07-12 11:09:28');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'coin', 'eur', '€', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'coin', 'eur', '€', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'coin', 'usd', '$', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'coin', 'usd', '$', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'coin', 'gbp', '£', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'coin', 'gbp', '£', 1, '2023-07-12 17:29:24');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_dashboard', 'Dashboard', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_dashboard', 'Dashboard', 1, '2023-07-12 17:29:24');

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_clients', 'Clientes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_clients', 'Clients', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_clients_list', 'Lista de Clientes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_clients_list', 'Lista de Clientes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_clients_add_client', 'Adicionar Novo Cliente', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_clients_add_client', 'Add New Client', 1, '2023-07-12 17:29:24');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_question', 'Questionário', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_question', 'Questions', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_question_create_form', 'Criar Formularios', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_question_create_form', 'Create Forms', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_question_list', 'Lista de Questões', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_question_list', 'Questions List', 1, '2023-07-12 17:29:24');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_organizator', 'Organizador', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_organizator', 'Organizator', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_organizator_goals', 'Objectivos', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_organizator_goals', 'Goals', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_organizator_task_list', 'Lista de Tarefas', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_organizator_task_list', 'Task List', 1, '2023-07-12 17:29:24');



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_sheddule', 'Marcações', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_sheddule', 'Sheddule', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_sheddule_clients', 'Clientes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_sheddule_clients', 'Clients', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_sheddule_list', 'Lista de Marcações', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_sheddule_list', 'Sheddule List', 1, '2023-07-12 17:29:24');

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_sheddule_create', 'Criar Marcação', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_sheddule_create', 'Create Sheddule', 1, '2023-07-12 17:29:24');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_events', 'Eventos', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_events', 'Events', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_events_list', 'Lista de Eventos', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_events_list', 'List Events', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_events_attendes', 'Participantes ', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_events_attendes', 'Attendes', 1, '2023-07-12 17:29:24');





INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_agenda', 'Agenda', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_agenda', 'Agenda', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_agenda_goals', 'Objectivos', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_agenda_goals', 'Goals', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_agenda_calendar', 'Calendario', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_agenda_calendar', 'Calendar', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_agenda_task_list', 'Lista de Tarefas', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_agenda_task_list', 'Task List', 1, '2023-07-12 17:29:24');



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_messages', 'Messages', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_messages', 'Mensagens', 1, '2023-07-12 17:29:24');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_services', 'Services', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_services', 'Serviços', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_services_details', 'Details', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_services_details', 'Detalhes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_services_category', 'Categories', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_services_category', 'Categorias', 1, '2023-07-12 17:29:24');




INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_company', 'Company', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_company', 'Empresa', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_company_details', 'Details', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_company_details', 'Detalhes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_company_team', 'Team', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_company_team', 'Equipa', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_company_locations', 'Locations', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_company_locations', 'Localizações', 1, '2023-07-12 17:29:24');



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_campaign', 'Campaign', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_campaign', 'Campanhas', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_campaign_details', 'Details', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_campaign_details', 'Detalhes', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_campaign_social', 'Social', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_campaign_social', 'Social', 1, '2023-07-12 17:29:24');


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_settings', 'Settings', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_settings', 'Configurações', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_settings_profile', 'User Profile', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_settings_profile', 'Perfil do User', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_settings_notifications', 'Notificações', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_settings_notifications', 'Notifications', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('pt', 'admin_leftside', 'menu_admin_settings_webpage', 'Minha Pagina', 1, '2023-07-12 17:29:24');
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`, `created_date`) VALUES ('en', 'admin_leftside', 'menu_admin_settings_webpage', 'My Page', 1, '2023-07-12 17:29:24');