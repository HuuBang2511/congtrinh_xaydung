PGDMP         *    	            {         !   quan11_quanlydonvikinhte_04052023    12.9    12.13     2           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            3           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            4           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            5           1262    461748 !   quan11_quanlydonvikinhte_04052023    DATABASE     �   CREATE DATABASE quan11_quanlydonvikinhte_04052023 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
 1   DROP DATABASE quan11_quanlydonvikinhte_04052023;
                postgres    false            e           1259    462585    tin_tuc    TABLE     �  CREATE TABLE public.tin_tuc (
    id bigint NOT NULL,
    tieude character varying(500),
    tomtat text,
    noidung text,
    anhdaidien character varying(200),
    xuatban boolean,
    luotxem numeric,
    nguontin character varying(300),
    loaitin_id integer,
    status smallint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    created_by smallint,
    updated_by smallint
);
    DROP TABLE public.tin_tuc;
       public         heap    postgres    false            6           0    0    COLUMN tin_tuc.tieude    COMMENT     :   COMMENT ON COLUMN public.tin_tuc.tieude IS 'Tiêu đề';
          public          postgres    false    357            7           0    0    COLUMN tin_tuc.tomtat    COMMENT     9   COMMENT ON COLUMN public.tin_tuc.tomtat IS 'Tóm tắt';
          public          postgres    false    357            8           0    0    COLUMN tin_tuc.noidung    COMMENT     9   COMMENT ON COLUMN public.tin_tuc.noidung IS 'Nôi dung';
          public          postgres    false    357            9           0    0    COLUMN tin_tuc.anhdaidien    COMMENT     F   COMMENT ON COLUMN public.tin_tuc.anhdaidien IS 'Ảnh đại diện';
          public          postgres    false    357            :           0    0    COLUMN tin_tuc.xuatban    COMMENT     <   COMMENT ON COLUMN public.tin_tuc.xuatban IS 'Xuất bản';
          public          postgres    false    357            ;           0    0    COLUMN tin_tuc.luotxem    COMMENT     ;   COMMENT ON COLUMN public.tin_tuc.luotxem IS 'Lượt xem';
          public          postgres    false    357            <           0    0    COLUMN tin_tuc.nguontin    COMMENT     <   COMMENT ON COLUMN public.tin_tuc.nguontin IS 'Nguồn tin';
          public          postgres    false    357            =           0    0    COLUMN tin_tuc.loaitin_id    COMMENT     =   COMMENT ON COLUMN public.tin_tuc.loaitin_id IS 'Loại tin';
          public          postgres    false    357            d           1259    462583    tin_tuc_id_seq    SEQUENCE     w   CREATE SEQUENCE public.tin_tuc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.tin_tuc_id_seq;
       public          postgres    false    357            >           0    0    tin_tuc_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.tin_tuc_id_seq OWNED BY public.tin_tuc.id;
          public          postgres    false    356            �           2604    462588 
   tin_tuc id    DEFAULT     h   ALTER TABLE ONLY public.tin_tuc ALTER COLUMN id SET DEFAULT nextval('public.tin_tuc_id_seq'::regclass);
 9   ALTER TABLE public.tin_tuc ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    357    356    357            /          0    462585    tin_tuc 
   TABLE DATA           �   COPY public.tin_tuc (id, tieude, tomtat, noidung, anhdaidien, xuatban, luotxem, nguontin, loaitin_id, status, created_at, updated_at, created_by, updated_by) FROM stdin;
    public          postgres    false    357          ?           0    0    tin_tuc_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.tin_tuc_id_seq', 1, false);
          public          postgres    false    356            �           2606    462593    tin_tuc tin_tuc_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.tin_tuc
    ADD CONSTRAINT tin_tuc_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.tin_tuc DROP CONSTRAINT tin_tuc_pkey;
       public            postgres    false    357            /      x������ � �     