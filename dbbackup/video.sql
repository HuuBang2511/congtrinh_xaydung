PGDMP                         {         !   quan11_quanlydonvikinhte_04052023    12.9    12.13     8           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            9           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            :           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ;           1262    461748 !   quan11_quanlydonvikinhte_04052023    DATABASE     �   CREATE DATABASE quan11_quanlydonvikinhte_04052023 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
 1   DROP DATABASE quan11_quanlydonvikinhte_04052023;
                postgres    false            g           1259    462596    video    TABLE     i  CREATE TABLE public.video (
    id bigint NOT NULL,
    ten character varying(300),
    duongdan character varying(300),
    nguondan character varying(300),
    luotxem numeric,
    xuatban boolean,
    status smallint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    created_by smallint,
    updated_by smallint
);
    DROP TABLE public.video;
       public         heap    postgres    false            <           0    0    COLUMN video.ten    COMMENT     4   COMMENT ON COLUMN public.video.ten IS 'Tên video';
          public          postgres    false    359            =           0    0    COLUMN video.duongdan    COMMENT     >   COMMENT ON COLUMN public.video.duongdan IS 'Đường dẫn';
          public          postgres    false    359            >           0    0    COLUMN video.nguondan    COMMENT     <   COMMENT ON COLUMN public.video.nguondan IS 'Nguồn dẫn';
          public          postgres    false    359            ?           0    0    COLUMN video.luotxem    COMMENT     9   COMMENT ON COLUMN public.video.luotxem IS 'Lượt xem';
          public          postgres    false    359            @           0    0    COLUMN video.xuatban    COMMENT     :   COMMENT ON COLUMN public.video.xuatban IS 'Xuất bản';
          public          postgres    false    359            f           1259    462594    video_id_seq    SEQUENCE     u   CREATE SEQUENCE public.video_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.video_id_seq;
       public          postgres    false    359            A           0    0    video_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.video_id_seq OWNED BY public.video.id;
          public          postgres    false    358            �           2604    462599    video id    DEFAULT     d   ALTER TABLE ONLY public.video ALTER COLUMN id SET DEFAULT nextval('public.video_id_seq'::regclass);
 7   ALTER TABLE public.video ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    358    359    359            5          0    462596    video 
   TABLE DATA           �   COPY public.video (id, ten, duongdan, nguondan, luotxem, xuatban, status, created_at, updated_at, created_by, updated_by) FROM stdin;
    public          postgres    false    359   �       B           0    0    video_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.video_id_seq', 1, false);
          public          postgres    false    358            �           2606    462604    video video_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.video
    ADD CONSTRAINT video_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.video DROP CONSTRAINT video_pkey;
       public            postgres    false    359            5      x������ � �     