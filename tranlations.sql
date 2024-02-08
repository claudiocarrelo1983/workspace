

DELETE FROM `user` WHERE `username` in ('tw_ccarrelo');
INSERT INTO `user` (`guid`, `username`, `first_name`, `last_name`, `full_name`, `gender`, `title`, `page_code_title`, `page_code_text`, `title_pt`, `text_pt`, `title_en`, `text_en`, `job_title`, `path`, `image`, `dob`, `company_dob`, `company_code_parent`, `company_code_url`, `company_code`, `company`, `service`, `starting_date`, `payment_month_fee`, `payment_year_fee`, `role`, `level`, `sublevel`, `status`, `language`, `email`, `type`, `summary`, `description`, `adress_line_1`, `adress_line_2`, `city`, `postcode`, `location_code`, `location`, `country`, `nif`, `logo`, `sheddule_array`, `time_window`, `website`, `facebook`, `pinterest`, `instagram`, `twitter`, `tiktok`, `linkedin`, `youtube`, `contact_number`, `code`, `terms_and_conditions`, `gdpr`, `privacy`, `newsletter`, `auth_key`, `password_hash`, `password_reset_token`, `created_at`, `updated_at`, `subscription`, `subscription_startingdate`, `color`, `order`, `active`, `created_date`, `verification_token`) VALUES ('A247E032-99D3-46CD-A941-36145D49BC012', 'tw_ccarrelo',  'Claudio', 'Carrelo', 'Claudio Carrelo', 'men', 'mr', 'team_title_2', 'team_description_2', NULL, NULL, NULL, NULL, 'Barbeiro', NULL, NULL, NULL, NULL, NULL, 'c20231025112035791', 'c20231025112035791', 'Bubu Fade - Barbeiro de homens', NULL, NULL, NULL, NULL, NULL, 'superadmin', NULL, 10, NULL, 'claudio@gmai.com', NULL, NULL, NULL, 'Rua Rio Douro nº42', 'Nº43', NULL, NULL, 'clc20231025112035791', NULL, 'PT', '224076736', NULL, '{"monday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"tuesday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"wednesday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"thursday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"friday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"saturday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"sunday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"true"}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '967235820', NULL, 1, NULL, 1, 1, 'A2jdP_Cc1eeMhM2ms4z7rSMmwALkzX6B', '$2y$13$7dSt60aKEvQOEZk1KYVFduExkU0LS4.SdR5GVblkXgDu/4IEFLgwe', NULL, 1698229236, 1698229236, NULL, NULL, NULL, NULL, 1, '2023-10-25 11:54:42', '1WXfTisnfnqvQAqcp-0yyG-oGA1Yj6lo_1698229236');


DELETE FROM `translations`; 

DELETE FROM `countries`;
INSERT INTO `countries` (`country_code`, `small_title`, `full_title`, `img`, `active`) VALUES ('en', 'EN', 'English', 'e', 0);
INSERT INTO `countries` (`country_code`, `small_title`, `full_title`, `img`, `active`) VALUES ('pt', 'PT', 'Portuguese', 'a', 0);

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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_team'  ,'Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','menu', 'menu_team'  ,'Team',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'menu_events'  ,'Eventos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','menu', 'menu_events'  ,'Events',1);

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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_3_1'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_3_1'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_title_3_2'  ,'',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','home', 'home_block_text_3_2'  ,'',1);
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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer','developed_by','Desenvolvido por',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','footer','developed_by','Developed by',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','footer','footer_label','Entre em contato',1);
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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_calculators_pace' ,'Pace Calculator',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_blog' ,'Blog',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_features' ,'What we do?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'menu', 'menu_services' ,'Services',1);
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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_3_1' ,'Our Method',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_3_1' ,'We aim to help all fitness professionals deal with issues that are time demanding and with that help him focus on what really matters, make you a better trainer.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_title_3_2' ,'Organize Training',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'home', 'home_block_text_3_2' ,'A solution made to help save time organizing the student training, where you can set a training and distribute to a choosen group or individual.',1);
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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_search' ,'Search',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_categories' ,'Categories',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en', 'recipes', 'recipes_block_all' ,'All Recipes',1);
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
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'resend_verification_email_title', 'Por favor preencha seu e-mail. um e-mail de verificação será enviado para lá.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'resend_verification_email_title', 'Please fill out your email. a verification email will be sent there.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'resend_verification_email_success_message', 'Por favor preencha seu e-mail. um e-mail de verificação será enviado para lá.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'resend_verification_email_success_message', 'Please fill out your email. a verification email will be sent there.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'resend_password_reset_email_title', 'Por favor preencha seu e-mail. um e-mail de verificação será enviado para lá.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'resend_password_reset_email_title', 'Please fill out your email. a verification email will be sent there.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'resend_password_reset_email_success_message', 'Por favor preencha seu e-mail. um e-mail de verificação será enviado para lá.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'resend_password_reset_email_success_message', 'Please fill out your email. a verification email will be sent there.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'resend_request_password_reset_email_title', 'Por favor preencha seu e-mail. um e-mail de verificação será enviado para lá.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'resend_request_password_reset_email_title', 'Please fill out your email. a verification email will be sent there.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'resend_request_password_reset_email_success_message', 'Por favor preencha seu e-mail. um e-mail de verificação será enviado para lá.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'resend_request_password_reset_email_success_message', 'Please fill out your email. a verification email will be sent there.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_title_1', 'Registe-se', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_text_1', 'Comece o seu trial grátis', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_dados', 'Informações de contato', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_dados', 'Contact Information', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_title_1', 'Sign Up', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_text_1', 'Start your free trial', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_register', 'Registro', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_register', 'Sign Up', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_title', 'Title', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_title', 'Titulo', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_first_name', 'First Name', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_first_name', 'Primeiro Nome', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_last_name', 'Surname', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_last_name', 'Apelido', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_role', 'Job Title', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_role', 'Posição', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_company', 'Company Name', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_company', 'Nome da Empresa', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_contact_number', 'Contact Number', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_contact_number', 'Contacto Movel', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_email', 'Email', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_email', 'Email', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_address', 'Address', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_address', 'Morada', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_address_1', 'Address', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_address_1', 'Morada 1', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_address_2', 'Address 2', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_address_2', 'Morada 2', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_city', 'City', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_city', 'Cidade', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_postcode', 'Postcode', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_postcode', 'Codigo Postal', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_location', 'Location', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_location', 'Localização', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_country', 'Country', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_country', 'País', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_country_select', 'Select Country', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_country_select', 'Selecione o Pais', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_login', 'Login Details', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_login', 'Detalhes de Login', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_username', 'Username', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_username', 'Username', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_password', 'Password', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_password', 'Password', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_validation_newsletter', 'Subscribe Newsletter', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_validation_newsletter', 'Subrescreva a Newsletter', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_validation_terms', 'I confirm that I have read and accepted the ', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_validation_terms', 'Eu confirmo que li e aceito a ', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_validation_privacy', 'I confirm that I have read and accepted the ', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_validation_privacy', 'Eu confirmo que li e aceito a ', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_privacy_link', 'privacy policy', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_privacy_link', 'politica de privacidade', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_register', 'Submit', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_register', 'Submeter', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_nif', 'Nif', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_nif', 'Nif', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_coin', 'Moeda', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_coin', 'Currency', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'signup', 'signup_block_voucher', 'Voucher', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'signup', 'signup_block_voucher', 'Voucher', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'coin', 'eur', '€', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'coin', 'eur', '€', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'coin', 'usd', '$', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'coin', 'usd', '$', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'coin', 'gbp', '£', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'coin', 'gbp', '£', 1);














INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'dashboard', 'Painel', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'dashboard', 'Dashboard', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'sheddule', 'Marcações', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'sheddule', 'Sheddule', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'sheddule_list', 'Lista de Marcações', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'sheddule_list', 'Sheddule List', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'sheddule_create', 'Criar Marcação', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'sheddule_create', 'Create Sheddule', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'clients', 'Clientes', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'clients', 'Clients', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'clients_list', 'Gestão de Clientes', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'clients_list', 'Manage Clients', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'clients_create', 'Adicionar Novo Cliente', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'clients_create', 'Add new Client', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'events', 'Eventos', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'events', 'Events', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'events_list', 'Gestão de Eventos', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'events_list', 'Manage Events', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'events_create', 'Criação de Eventos', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'events_create', 'Create Events', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'notifications', 'Notificações', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'notifications', 'Notifications', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'notifications_list', 'Mensagens', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'notifications_list', 'Messages', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'notifications_subject', 'Assuntos', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'notifications_subject', 'Subjects', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'services', 'Serviço', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'services', 'Service', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'contact_us', 'Contate-nos', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'contact_us', 'Contact Us', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'gallery', 'Galeria', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'gallery', 'Gallery', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'services_list', 'Lista de Serviços', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'services_list', 'Service List', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'services_category', 'Categorias de Serviços', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'services_category', 'Service Categories', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'services_packages', 'Pacotes', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'services_packages', 'Packages', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'company', 'Empresa', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'company', 'Company', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'company_details', 'Detalhes', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'company_details', 'Details', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'team', 'Equipa', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'team', 'Team', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'schedule', 'Agendar', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'schedule', 'Schedule', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'choose_professional', 'Escolha o Professional', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'choose_professional', 'Choose Professional', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'choose_service', 'Escolha os Serviços', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'choose_service', 'Choose Services', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'choose_location', 'Escolha a Localização', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'choose_location', 'Choose Location', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'choose_services', 'Escolha o Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'choose_services', 'Choose Services', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'booking_new_appointment', 'Marcação', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'booking_new_appointment', 'Booking', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'view_appointments', 'Marcação', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'view_appointments', 'My Past Booking', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'my_profile', 'Meu Profile', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'my_profile', 'My Profile', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'booking_complete', 'Marcação Completa', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'booking_complete', 'Booking Completed', 1);



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'company_locations', 'Localização', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'company_locations', 'Location', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'page_appearance', 'Aparência da página', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'page_appearance', 'Page Appearance', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'manteinance_mode', 'Modo de manutenção', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'manteinance_mode', 'Manteinance Mode', 1);




INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'messages', 'Mensagens', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'messages', 'Messages', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'sms', 'SMS', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'sms', 'SMS', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'whatsapp', 'WhatsApp', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'whatsapp', 'WhatsApp', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'message_templates', 'Templates', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'message_templates', 'Templates', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'configurations', 'Configurações', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'configurations', 'Settings', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'profile', 'Perfil do User', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'profile', 'User Profile', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'scheduling_history', 'Histórico de Agendamento', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'scheduling_history', 'Appointment History', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'no_more_booking_available_for_today', 'Não há mais reservas disponíveis para este dia.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'no_more_booking_available_for_today', 'No more bookings available for this day.', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'definitions', 'Definições', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'definitions', 'Definitions', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'faqs_admin', 'Faq´s', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'faqs_admin', 'Faq´s', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'view', 'Visualização', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'view', 'View', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'create', 'Criar', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'create', 'Create', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'update', 'Actualizar', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'update', 'Update', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'index', 'Lista de', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'index', 'List', 1);





INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'account', 'Minha Conta', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'account', '
', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'menu_admin_my_application', 'Minha Conta', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'menu_admin_my_application', 'My Account', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'menu_admin_settings_definitions', 'Definições', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'menu_admin_settings_definitions', 'Definitions', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'login_logout', 'Logout', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'login_logout', 'Logout', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'admin_leftside', 'your_registration_url', ' URL da sua página', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'admin_leftside', 'your_registration_url', ' Your registration Url', 1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text','general_questions','Questões Gerais', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text','general_questions','General Questions', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text','privacy_policy','Politica de Privacidade',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text','privacy_policy','Privacy Policy',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'welcome_back','Bem-vindo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'welcome_back','Welcome Back',1);																								
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'clients','Clientes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'clients','Clients',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'team_members','Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'team_members','Team',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'team_member','Profissional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'team_member','Professional',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'team_username','Membros da Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'team_username','Team Members',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'booking_code','Referência',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'booking_code','Booking Code',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'resellers','Revendedores',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'resellers','Resellers',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'webpage','Página Web',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'webpage','Webpage',1);																							
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'bookings','Reservas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'bookings','Bookings',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'revenue','Receita',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'revenue','Revenue',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'cancelations','Cancelamentos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'cancelations','Cancelations',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'from_previous_day','Dia Anterior',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'from_previous_day','From Previous Day',1);																							
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'total_annual','Dia Anterior',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'total_annual','From Previous Day',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'total_annual','Dia Anterior',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'total_annual','From Previous Day',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'past_earnings','Ganhos Passados',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'past_earnings','Past Earnings',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'total_annual','Total Anual',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'total_annual','Total Annual',1);																							
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'day','Dia',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'day','Day',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'yesterday','Ontem',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'yesterday','Yesterday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'week','Semana',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'week','Week',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'month','Mês',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'month','Month',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'year','Ano',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'year','Year',1);																								
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'services','Serviços',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'services','Services',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'location','Localização',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'location','Location',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'total','Total',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'total','Total',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'day_or_hours','Enviar Lembrete',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'day_or_hours','Send Reminder',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'create_services_category_first','Criar primeiro a categoria de serviço.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'create_services_category_first','Create service category first',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','admin_text', 'create_team_first','Criar primeiro pelo menos um membro de equipa.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','admin_text', 'create_team_first','Create at least one team member.',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_company_location','Criar Localização da Empresa.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_company_location','Create Company Location.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_events_button','Criar Evento',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_events_button','Create Event',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'book_again','Agendar Novamente',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'book_again','Book Again',1);



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'login_button','Login',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'login_button','Login',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'sign_up_button','Registar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'sign_up_button','Sign Up',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'edit_button','Editar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'edit_button','Edit',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'missed_button','Faltou',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'missed_button','Missed',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'check_button','Compareceu',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'check_button','Attended',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'cancel_button','Cancelar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'cancel_button','Cancel',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'edit_button','Editar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'edit_button','Edit',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'confirm_open_ticket_button','Fechar o Ticket',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'confirm_open_ticket_button','Close Ticket',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'go_back_button','Voltar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'go_back_button','Go Back',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'delete_button','Apagar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'delete_button','Delete',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'back_button','Voltar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'back_button','Back',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'close_button','Fechar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'close_button','Close',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'subscribe_button','Subscrever',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'subscribe_button','Subscribe',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'save_button','Salvar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'save_button','Save',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'send_button','Enviar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'send_button','Send',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'search_button','Procurar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'search_button','Search',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'reset_button','Limpar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'reset_button','Reset',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'submit_button','Submeter',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'submit_button','Submit',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_button','Selecionar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_button','Select',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'book_now_button','Reserve Agora',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'book_now_button','Book Now',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_services_category_button','Criar Categoria de Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_services_category_button','Create Service Category',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_services_button','Criar Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_services_button','Create Service',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_template','Criar Template',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_template','Create Template',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_button','Criar',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_button','Create',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_team','Adicionar Membro da Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_team','Create Team Member',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_team_new','Adicionar Novo Membro da Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_team_new','Create New Team Member',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_newsletter_button','Criar mensagem predefinida Newsletter',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_newsletter_button','Create predefined Newsletter message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_sms_button','Criar mensagem predefinida SMS',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_sms_button','Create predefined SMS message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_whatsapp_button','Criar mensagem predefinida WhatsApp',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_whatsapp_button','Create predefined WhatsApp message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_sheddule_button','Marque uma consulta',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_sheddule_button','Book an Appointment',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'create_notification_subject_button','Criar Assunto da Notificação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'create_notification_subject_button','Create Notification Subject',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_template_code','Escolha o Template',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_template_code','Select the Template',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_language','Escolha a Língua',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_language','Select Language',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_company_code','Escolha a Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_company_code','Select Company',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_company_code_location','Escolha a Localização da Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_company_code_location','Select Company Location',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_ticket_status','Escolha Estado',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_ticket_status','Select Status',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_team','Escolha Membro da Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_team','Select Team Member',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_services','Escolha o Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_services','Select Service',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_services_category','Escolha a Categoria de Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_services_category','Select Service Category',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_gender','Escolha o Gênero',1);                                                                                         
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_gender','Select Gender',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_title','Escolha o Título',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_title','Select Title',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_level','Escolha o Level',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_level','Select Level',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_subject','Escolha o Assunto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_subject','Select Subject',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_date','Escolha a data...',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_date','Select date...',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_campaign_type_email','Escolha o Frequência do Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_campaign_type_email','Choose Email Frequency',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_campaign_type_sms','Escolha o Frequência do Sms',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_campaign_type_sms','Choose Email Frequency',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_time','Escolha a Hora ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_time','Choose the Time',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_time_window','Escolha a Janela de Tempo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_time_window','Choose the Time Window',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_duration','Escolha a Duração do Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_duration','Choose the Duration of the Service',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_active','Escolha Activo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_active','Select Active',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','buttons', 'select_hour_days','Escolha o Dia ou Hora',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','buttons', 'select_hour_days','Choose Day or Hour',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'team','Equipa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'team','Team',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'client','Cliente',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'client','Client',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'men','Homem',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'men','Men',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'women','Mulher',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'women','Women',1);



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'onetime_campaign','Uma Vez',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'onetime_campaign','One Time',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'birthday_campaign','Birthday Message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'birthday_campaign','Mensagem de Aniversário',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'reminder_campaign','Lembrete de Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'reminder_campaign','Service Reminder',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'every_day_campaign','Todos os Dias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'every_day_campaign','Every Day',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'every_week_campaign','Todas as Semanas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'every_week_campaign','Every Week',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'every_month_campaign','Todos os Meses',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'every_month_campaign','Every Month',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'every_year_campaign','Todos os Anos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'every_year_campaign','Every Year',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'any_location','Todos os Anos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'any_location','Every Year',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'any_teammember','Sem Preferência',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'any_teammember','No Preference',1);





INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'mr','Sr',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'mr','Mr',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'miss','Sra',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'miss','Miss',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'days','Dias',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'days','Days',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','select_options', 'hours','Horas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','select_options', 'hours','Hours',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'choose_all','Selecionar Tudo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'choose_all','Choose All',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'template_code','Template',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'template_code','Template',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'price','Preço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'price','Price',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'ticket_number','Número do Ticket',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'ticket_number','Ticket Number',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'username','Username',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'username','Username',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'date_of_birth','Data de Nascimento',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'date_of_birth','Date of Birth',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'location_code','Localização',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'location_code','Location',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'category_code','Categoria',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'category_code','Category',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'full_name','Nome Completo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'full_name','Full Name',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'subject','Assunto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'subject','Subject',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'text','Mensagem',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'text','Message',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'contact_number','Número de contato',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'contact_number','Contact Number',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'email','Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'email','Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'price_advanced','Pagamento Avançado',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'price_advanced','Advanced Payment',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'reply','Resposta',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'reply','Answer',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'reply','Resposta',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'reply','Answer',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'nif','NIF',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'nif','NIF',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'date','Data',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'date','Date',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'time','Hora',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'time','Hour',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'time_window','Janela de Tempo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'time_window','Time Window',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'duration','Duração',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'duration','Duration',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'first_name','Primeiro Nome',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'first_name','First Name',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'last_name','Último Nome',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'last_name','Last Name',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'gender','Gênero',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'gender','Gender',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'dob','Data de Nascimento',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'dob','Date of Birth',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'active','Activo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'active','Active',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'created_date','Data de Criação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'created_date','Created Date',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'title','Titulo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'title','Title',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'level','Nível',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'level','Level',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'company_code_url','Codigo Url de Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'company_code_url','Url Company Code',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'company_code','Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'company_code','Company',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'company_code_location','Localização de Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'company_code_location','Company Location',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'service_cat','Categoria de Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'service_cat','Service Category',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'client_username','Resposta',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'client_username','Answer',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'schedule_date','Data Marcada',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'schedule_date','Scheduled Date',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'service_code','Codigo Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'service_code','Service Code',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'service_name','Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'service_name','Service',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'service','Serviço',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'service','Service',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'view_more','Veja Mais',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'view_more','View More',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'personal_details','Dados Pessoais',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'personal_details','Personal details',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'details','Detalhes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'details','Details',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'code','Código',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'code','Code',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'language','Línguas ',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'language','Languages',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'closed_ticket','Estado do Ticket',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'closed_ticket','Ticket Status',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'price_range','Preço Máximo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'price_range','Max. Price',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'closed','Fechado',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'closed','Closed',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'open','Aberto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'open','Open',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'color_text','Cor do Texto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'color_text','Text Color',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'color','Cor da Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'color','Company Color',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'banner_image','Banner',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'banner_image','Banner',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'logo_image','Logo da Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'logo_image','Company Logo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'order','Ordem',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'order','Order',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'campaign_type','Tipo de Campanha',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'campaign_type','Campaign Type',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'schedule_hour','Hora',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'schedule_hour','Hour',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'from_schedule_date','Data de Início',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'from_schedule_date','From Date',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'to_schedule_date','To Date',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'to_schedule_date','Data de Fim',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'subject_pt','Assunto (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'subject_pt','Subject (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'subject_en','Assunto (EN)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'description','Description of the field',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'description','Descrição do Campo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'description_text','Text Description of the field',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'description_text','Descrição do Campo de Texto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'subject_en','Subject (EN)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'text_pt','Mensagem (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'text_pt','Message (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'text_en','Mensagem (EN)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'text_en','Message (EN)',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'title_pt','Título (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'title_pt','Title (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'title_en','Título (EN)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'title_en','Title (EN)',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'subject_pt','Subject (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'subject_pt','Assunto (PT)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'subject_en','Subject (EN)',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'subject_en','Assunto (EN)',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'message','Mensagem',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'message','Message',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'type','Tipo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'type','Type',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'hint_banner','A imagem precisa ter largura mínima de 1800px e altura mínima de 380px.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'hint_banner','The image needs to be minimum 1800px width and minimum height of 380px.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','table_name', 'hint_image','The image needs to be 900 x 500',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','table_name', 'hint_image','The image needs to be 900 x 500',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'page_header_text_hide','A página apenas é visivel para si,',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'page_header_text_hide','The page is only visible to you,',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'page_header_text_show','A sua página encontra-se visivel ao publico,',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'page_header_text_show','The page is visible to the public,',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'click_hide','clique aqui para esconder.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'click_hide','click here to hide.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'click_show','clique aqui para publicar.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'click_show','click here to publish.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'menu_location','Localização',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'menu_location','Location',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'follow_us','Siga-nos',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'follow_us','Follow Us',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'our_address_title','Morada',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'our_address_title','Address',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','client_labels', 'business_hours_title','Horário',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','client_labels', 'business_hours_title','Business Hours',1);



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'menu_admin_campaign_placeholder_text','Os ‘placeholders’ são como os ‘mail merges’ que definem onde você quer um valor que será definido mais tarde. Pode utilizar estes ‘placeholders’ nos campos de mensagem e assunto. Por exemplo, se utilizar #primeiro_nome# na mensagem, esse valor será substituído pelo "primeiro nome" do utilizador.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'menu_admin_campaign_placeholder_text','Placeholders are like mail merge fields that define where you want a value that will be set out later. You can use these placeholders on the message and subject fields. For example, using #first_name# on the message will replace that value with the correct user ‘first name’. ',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'menu_admin_campaign_placeholder_title','Placeholder',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'menu_admin_campaign_placeholder_title','Placeholder',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'menu_admin_company','Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'menu_admin_company','Company',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'menu_admin_company_locations_create','Criar Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'menu_admin_company_locations_create','Create Company',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'menu_admin_company_locations_edit','Editar Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'menu_admin_company_locations_edit','Edit Company',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'menu_admin_company_locations_view','Ver Localização da Empresa',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'menu_admin_company_locations_view','View Company',1);





INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#username#','#username#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#username#','#username#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_username','Username',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_username','Username',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#title#','#titulo#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#title#','#title#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_title','Título',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_title','Title',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#first_name#','#primeiro_nome#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#first_name#','#first_name#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_first_name','Primeiro Nome',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_first_name','First Name',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#last_name#','#ultimo_nome#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#last_name#','#last_name#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_last_name','Último Nome',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_last_name','Last Name',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#contact_number#','#numero_de_contacto#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#contact_number#','#contact_number#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_contact_number','Número de contacto',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_contact_number','Contact Number',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#email#','#email#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#email#','#email#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_email','Email',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_email','Email',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', '#dob#','#data_de_nascimento#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', '#dob#','#date_of_birth#',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','placeholders', 'placeholder_dob','Data de Nascimen',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','placeholders', 'placeholder_dob','Date of Birth',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'booking', 'your_booking', 'A Sua Reserva', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'booking', 'your_booking', 'Your Booking', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'booking', 'booking_message', 'A sua marcação foi efetuada com sucesso e foi-lhe enviado um email com a confirmação.', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'booking', 'booking_message', 'Your appointment was successful and an email was sent to you with confirmation.', 1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'monday','Segunda-feira',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'monday','Monday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'tuesday','Terça-feira',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'tuesday ','Tuesday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'wednesday','Quarta-feira',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'wednesday','Wednesday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'thursday','Quinta-feira',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'thursday','Thursday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'friday','Sexta-feira',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'friday','Friday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'saturday','Sábado',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'saturday','Saturday',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','week_days', 'sunday','Domingo',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','week_days', 'sunday','Sunday',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','language', 'en','Inglês',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','language', 'en','English',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','language', 'pt','Português',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','language', 'pt','Portuguese',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','boolean', 'yes','Sim',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','boolean', 'yes','Yes',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','boolean', 'no','Não',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','boolean', 'no','No',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','validation_message', 'no_permission','Você não tem permissão.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','validation_message', 'no_permission','You don´t have no permission.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','validation_message', 'no_permission_trial','O seu pack trial terminou.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','validation_message', 'no_permission_trial','You ended the 30 days trial.',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','validation_message', 'schedule_invalid','Horário inválido.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','validation_message', 'schedule_invalid','Invalid time',1);



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','validation_message', 'sure_delete_appointment','Tem a certeza de que deseja eliminar este compromisso?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','validation_message', 'sure_delete_appointment','Are you sure you want to delete this appointment?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','validation_message', 'cannot_cancel_timeframe','Já não é possivel cancelar, contacte o seu Profissional que lhe vai atender.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','validation_message', 'cannot_cancel_timeframe','It is no longer possible to cancel, please contact your the Professional that you have the appointment.',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','manteinance', 'menu_admin_campaign_manteinance_text','O modo de manutenção é essencial quando você precisa fazer alterações em seu site sem causar interrupções para seus visitantes. Isso permite que você exiba uma mensagem amigável para informar seu público de que seu site está temporariamente indisponível, mas voltará em breve. Basta clicar no botão ligar/desligar abaixo para iniciar o processo.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','manteinance', 'menu_admin_campaign_manteinance_text','Maintenance mode is essential when you need to perform changes on your website without causing disruptions to your visitors. It allows you to display a user-friendly message to inform your audience that your website is temporarily unavailable but will be back shortly. Simply click the on/off button below to initiate the process. translate portuguese',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','manteinance', 'manteinance_default_text',"Desculpe-nos pela inconveniência. Estamos realizando algumas melhorias em nosso site para oferecer uma experiência ainda melhor. Estaremos de volta em breve.",1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','manteinance', 'manteinance_default_text',"Sorry for the inconvenience. We are making some improvements to our website to provide an even better experience. We'll be back soon! Thank you for your patience.",1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','popup', 'are_you_sure_delete','Tem certeza de que deseja excluir este item?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','popup', 'are_you_sure_delete','Are you sure you want to delete this item?',1);




INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'page_booking_title'  ,'Reservas',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','menu', 'page_booking_title'  ,'Reservation',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','menu', 'page_booking_text'  ,'Faz a tua reserva geral e garante a sua vaga.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','menu', 'page_booking_text'  ,'Make your general reservation and guarantee your spot.',1);



INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'create_booking'  ,'Criar Marcação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'create_booking'  ,'Create Booking',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'edit_booking'  ,'Editar Marcação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'edit_booking'  ,'Edit Booking',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'cancel_booking'  ,'Cancelar Marcação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'cancel_booking'  ,'Cancel booking',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'question_cancel'  ,'Pretende Cancelar?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'question_cancel'  ,'Are you sure you want to cancel?',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'confirm_booking'  ,'Confirmar Marcação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'confirm_booking'  ,'Confirm Booking',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'question_client_attended'  ,'Deseja confirmar a marcação?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'question_client_attended'  ,'You want to confirm attendance?',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'client_missed'  ,'Marcação Perdida',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'client_missed'  ,'Missed Booking',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'question_sure_cancel'  ,'A sua marcação foi perdida?',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'question_sure_cancel'  ,'Your booking has been missed?',1);






INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'menu_admin_sheddule'  ,'Gestão',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'menu_admin_sheddule'  ,'Management',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'today'  ,'Hoje',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'today'  ,'Today',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'booking', 'appointments', 'Histórico', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'booking', 'appointments', 'Appointments', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('pt', 'booking', 'booking', 'Marcações', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`, `active`) VALUES ('en', 'booking', 'booking', 'Booking', 1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'team-booking'  ,'Marcações',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'team-booking'  ,' Booking',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'team-appointments'  ,'Agenda',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'team-appointments'  ,'Appointments',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'client-profile'  ,'Perfil',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'client-profile'  ,'Profile',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'choose_another_teammember'  ,'Outro colaborador',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'choose_another_teammember'  ,'Other Professional',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'choose_another'  ,'Nova Marcação',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'choose_another'  ,'New Booking',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'morning'  ,'Manhã',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'morning'  ,'Morning',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'afternoon'  ,'Tarde',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'afternoon'  ,'Afternoon',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'night'  ,'Noite',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'night'  ,'Night',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'please_choose_a_time'  ,'Por favor escolha uma hora.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'please_choose_a_time'  ,'Please choose a time.',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'timespan_validation'  ,'A janela de tempo encontra-se fechada.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'timespan_validation'  ,'The time window has closed.',1);


INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'occupied_error_message'  ,'{time} - A janela de tempo não está mais disponível.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'occupied_error_message'  ,'{time} - The time window is not longer available.',1);

INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('pt','booking', 'occupied_error_message_datetime'  ,'A janela de tempo com a hora {time} e a data {date} já não encontra mais disponível.',1);
INSERT INTO `translations` (`country_code`, `page`, `page_code`, `text`,`active`) VALUES ('en','booking', 'occupied_error_message_datetime'  ,'The time window with the time of {time} and date {date} is no longer available.',1);

